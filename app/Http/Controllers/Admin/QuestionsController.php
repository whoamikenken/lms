<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyQuestionRequest;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\Question;
use App\Models\Option;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuestionsController extends Controller
{
    public function index()
    {
        
        $questions = Question::all();
        $categories = Category::where('isRemove', false)->whereNotIn('year', ['LEARNINGSTYLE'])->latest()->get();

        return view('admin.questions.index', compact('questions','categories'));
    }

    public function create()
    {
       
        $categories = Category::where('isRemove', false)->whereNotIn('year', ['LEARNINGSTYLE'])->pluck('name', 'id');

        return view('admin.questions.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $question = Question::create([
            "category_id" => $request->input('category_id'),
            "question_text" => $request->input('question_text'),
        ]);

        foreach($request->option_text as $key => $option_text)
        {
            Option::create(
                [
                    'question_id'                   => $question->id,
                    'option_text'                   => $option_text,
                    'points'                        => $request->points[$key],
                    
                ]
            );
        }

        return response()->json(['success' => 'Successfully Added Record.']);
    }

    public function edit(Question $question)
    {
        
        $categories = Category::where('isRemove', false)->whereNotIn('year', ['LEARNINGSTYLE'])->pluck('name', 'id');

        $question->load('category');

        return view('admin.questions.edit', compact('categories', 'question'));
    }

    public function update(Request $request, Question $question)
    {

        $question->update([
            "category_id" => $request->input('category_id'),
            "question_text" => $request->input('question_text'),
        ]);

        Option::whereNotIn('option_text', $request->option_text)
                    ->where('question_id', $question->id)
                    ->delete();

        foreach($request->option_text as $key => $option_text)
        {
            Option::updateOrCreate(
                [
                    'question_id'                   => $question->id,
                    'option_text'                   => $option_text,
                    'points'                        => $request->points[$key],
                ],
                [
                    'question_id'                   => $question->id,
                    'option_text'                   => $option_text,
                    'points'                        => $request->points[$key],
                ]
            );
        }

        return response()->json(['success' => 'Successfully Updated Record.']);
    }


    public function destroy(Question $question)
    {
       
        $question->delete();

        return back();
    }
}
