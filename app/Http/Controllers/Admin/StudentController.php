<?php

namespace App\Http\Controllers\Admin;

use File;
use Validator;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Option;
use App\Models\Result;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\QuestionResult;
use App\Rules\MatchOldPassword;
use App\Models\LearningStyleResult;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Rules\QuestionsValidationRule;
use App\Http\Requests\StoreTestRequest;


class StudentController extends Controller
{
    public function welcome(){
          if(auth()->user()->roles()->pluck('id')->implode(', ') == '1'){;  
            return redirect()->route('admin.dashboard');
          }else{
            return view('admin.student.welcome');
          }
    }
    public function assessment(){

        $already_take = Result::where('user_id', auth()->user()->id)
                                ->where('year', auth()->user()->year)
                                ->first();
        
        $categories = Category::where('isRemove', false)->whereNotIn('year', ['LEARNINGSTYLE'])->where('year',auth()->user()->year)->with(['categoryQuestions' => function ($query) {
            $query->inRandomOrder()
                ->with(['questionOptions' => function ($query) {
                    $query->inRandomOrder();
                }]);
        }])
            ->whereHas('categoryQuestions')
            ->get();
        Result::updateOrCreate(
            [
                'user_id' => auth()->user()->id,
                'year'  => auth()->user()->year,
            ],
            [
                'user_id' => auth()->user()->id,
                'start_time' => Carbon::now(),
            ]
        );

        $category_first =  $categories->first();
        // dd($category_first)
        return view('admin.student.assessment', compact('categories','category_first'));
        
        
    }

    public function learning_style(){

        $already_take = Result::where('user_id', auth()->user()->id)
                                ->where('year', auth()->user()->year)
                                ->first();
        
        $categories = Category::where('isRemove', false)->where('year', ['LEARNINGSTYLE'])->with(['categoryQuestions' => function ($query) {
            $query->inRandomOrder()
                ->with(['questionOptions' => function ($query) {
                    $query->inRandomOrder();
                }]);
        }])
            ->whereHas('categoryQuestions')
            ->get();
        Result::updateOrCreate(
            [
                'user_id' => auth()->user()->id,
                'year'  => auth()->user()->year,
            ],
            [
                'user_id' => auth()->user()->id,
                'start_time' => Carbon::now(),
            ]
        );

        $category_first =  $categories->first();
        return view('admin.student.learning_style', compact('categories','category_first'));
        
        
    }
    
    public function store(StoreTestRequest $request)
    {
        $options = Option::find(array_values($request->input('questions')));
        
        $q = Question::count();
        $q = $q / 2;

        if($options->sum('points') > $q){
            $grade = "Passed";
        }else{
            $grade = "Failed";
        }

        $result = auth()->user()->userResults()->updateOrCreate(
            [
                'user_id' => auth()->user()->id,
                'year'  => auth()->user()->year,
            ],
            [
                'total_points' => $options->sum('points'),
                'end_time' => Carbon::now(),
                'year'  => auth()->user()->year,
                'course'  => auth()->user()->course,
                'grade' => $grade,
            ]
        );

        $questions = $options->mapWithKeys(function ($option) {
            return [$option->question_id => [
                        'option_id' => $option->id,
                        'points' => $option->points,
                        'category_id' => $option->question->category_id,
                        'category_text' =>  $option->question->category->name,
                        'course' =>  auth()->user()->course,
                    ]
                ];
            })->toArray();

        $result->questions()->sync($questions);

        
        

        return redirect()->route('admin.student.assessment.show', $result->id);
    }
    public function store_learning_style(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'questionId' => 'required|array',
            'questions' => 'required|array',
            'questionId.*' => ['required', 'exists:questions,id', function ($attribute, $value, $fail) use ($request) {
                $index = str_replace('questionId.', '', $attribute);
                $questionField = 'questions.' . $index;

                if (!isset($request['questions'][$index]) || empty($request['questions'][$index])) {
                    $fail("The question for '{$value}' is required.");
                }
            }],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        $options = $request->input('questions');

        foreach($options as $key => $data){
            LearningStyleResult::updateOrCreate(
                [
                    'user_id'   => auth()->user()->id,
                    'question_id'   => $key,
                ],
                [
                    'user_id'   => auth()->user()->id,
                    'question_id'   => $key,
                    'answer'    => $data,
                ]
            );
        }
        auth()->user()->update([
            'isTakeLearningStyle'   => true,
        ]);

       return redirect()->route('admin.student.welcome');
    }

    

    public function show($result_id)
    {
        $result = Result::where('id', $result_id)->first();
        $score = $result->total_points;
        $questions = Question::count();

        

        $percent = $score / $questions;
        $percent = $percent * 100;
        $percent = number_format($percent, 2, '.', ',');


        $to = $result->start_time;
        $from = $result->end_time;
        $diff = $to->diffInMinutes($from);

        $data = QuestionResult::select(
            \DB::raw("SUM(points) as points"),
            \DB::raw("category_text as category"))
                ->where('result_id', $result_id)
                ->groupBy('category')
                ->orderBy('category', 'ASC')
                ->get();
        $result_data = [];

        foreach($data as $row) {
            $result_data['label'][] = $row->category;
            $result_data['data'][] =  $row->points;
        }

        $data_results = json_encode($result_data);
        return view('admin.student.results', compact('result','percent','diff','data_results'));
    }

    public function result_category($result_id){
        $result = Result::where('id', $result_id)->first();
        
        $categories = Category::where('isRemove', false)
        ->whereNotIn('year', ['LEARNINGSTYLE'])
        ->where('year', auth()->user()->year)
        ->latest()->get();

        foreach ($categories as $category) {
            $points = QuestionResult::where('category_id', $category->id)
                                    ->where('result_id', $result_id)
                                    ->sum('points');

            $questions = QuestionResult::where('category_id', $category->id)
                                    ->where('result_id', $result_id)
                                    ->count();

            $percent = $points / $questions ?? 1 ;
            $percent = $percent * 100;
            $percent = number_format($percent, 2, '.', ',');       

            $results_top[] = array(
                'points' => $points,
                'cat_title' => $category->name,
                'percent' => $percent,
            );

            $results_bottom[] = array(
                'points' => $points,
                'cat_title' => $category->name,
                'percent' => $percent,
            );
        }
        array_multisort($results_top, SORT_DESC);
        array_multisort($results_bottom, SORT_ASC);
    
        return response()->json([
            'results_top' => $results_top ?? '',
            'results_bottom' => $results_bottom ?? '',
        ]);
    }

    public function update(){
        return view('admin.student.update_account'); 
    }

    public function update_account(Request $request,User $user_id){
        $validated =  Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'student_no' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user_id->id],
            'contact_number' => ['required','string', 'min:8','max:11'],
            'gender' => ['required'],
            'course' => ['required'],
            'year' => ['required'],
            'section' => ['required'],
           
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        $user_id->update([
            'name'  => $request->input('name'),
            'student_no'  => $request->input('student_no'),
            'email'  => $request->input('email'),
            'contact_number'  => $request->input('contact_number'),
            'gender'  => $request->input('gender'),
            'course'  => $request->input('course'),
            'year'  => $request->input('year'),
            'section'  => $request->input('section'),
        ]);

        return response()->json(['success' => 'Updated Successfully.']);

    }

    public function history(){
        $results = Result::where('user_id', auth()->user()->id)->latest()->get();
        return view('admin.student.history', compact('results')); 
    }

    public function changepassword(Request $request , User $user)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'current_password' => ['required',new MatchOldPassword],
            'new_password' => ['required'],
            'confirm_password' => ['required','same:new_password'],
           
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        User::find($user->id)->update([
            
            'password' => Hash::make($request->input('new_password')),
          
        ]);
        return response()->json(['success' => 'Updated Successfully.']);
    }
    
}
