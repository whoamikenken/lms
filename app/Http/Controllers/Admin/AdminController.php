<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RoleUser;
use App\Models\Category;
use App\Models\Question;
use App\Models\Result;
use App\Models\QuestionResult;

class AdminController extends Controller
{
   
    public function dashboard(){
        $users = User::count();
        $users = $users - 1;
        $categories = Category::count();
        $questions = Question::count();

        $usersf = User::where('gender', 'FEMALE')->count();
        $usersm = User::where('gender', 'MALE')->count();

        $usersfbsit = User::where('gender', 'FEMALE')->where('course', 'BSIT')->count();
        $usersmbsit = User::where('gender', 'MALE')->where('course', 'BSIT')->count();


        $usersfbscs = User::where('gender', 'FEMALE')->where('course', 'BSCS')->count();
        $usersmbscs = User::where('gender', 'MALE')->where('course', 'BSCS')->count();
        

        $r_bsit = Result::where('course', 'BSIT')->count();
        $r_bscs = Result::where('course', 'BSCS')->count();

        $ls_bsit = User::where('course', 'BSIT')->where('isTakeLearningStyle', 1)->count();
        $ls_bscs = User::where('course', 'BSCS')->where('isTakeLearningStyle', 1)->count();

        $users_bsit = User::where('course', 'BSIT')->count();
        $users_bscs = User::where('course', 'BSCS')->count();

        $failed_it = Result::where('grade', 'Failed')->where('course', 'BSIT')->count();
        $passed_it = Result::where('grade', 'Passed')->where('course', 'BSIT')->count();

        $failed_cs = Result::where('grade', 'Failed')->where('course', 'BSCS')->count();
        $passed_cs = Result::where('grade', 'Passed')->where('course', 'BSCS')->count();

        $failed_bsit = $passed_bscs = $passed_bsit = array();

        if($r_bsit < 1 & $users_bsit < 1){
            $percent_bscs = 0;
        }else{
            $percent_bsit = $r_bsit ?? 1 / $users_bsit ?? 1 * 100;
            $failed_bsit = $failed_it ?? 1 / $r_bsit ?? 1 * 100;
            $passed_bsit  = $passed_it ?? 1 / $r_bsit ?? 1 * 100;

            $percent_bsit = number_format($percent_bsit, 0, '.', ',');
            $failed_bsit = number_format($failed_bsit, 0, '.', ',');
            $passed_bsit = number_format($passed_bsit, 0, '.', ',');
        }

        if($r_bscs < 1 & $users_bscs < 1){
            $percent_bscs = 0;
        }else{
            $percent_bscs = $r_bscs ?? 1 / $users_bscs ?? 1 * 100;
            $failed_bscs = $failed_cs ?? 1 / $r_bscs ?? 1 * 100;
            $passed_bscs  = $passed_cs ?? 1 / $r_bscs ?? 1 * 100;

            $percent_bscs = number_format($percent_bscs, 0, '.', ',');
            $failed_bscs = number_format($failed_bscs, 0, '.', ',');
            $passed_bscs = number_format($passed_bscs, 0, '.', ',');
        }
        
        //IT
        $data_bsit = QuestionResult::select(
            \DB::raw("SUM(points) as points"),
            \DB::raw("category_text as category"))
            ->where('course', 'BSIT')
            ->groupBy('category')
            ->orderBy('category', 'ASC')
            ->get();
        $result_data_bsit = [];

        foreach($data_bsit as $row) {
            $result_data_bsit['label'][] = $row->category;
            $result_data_bsit['data'][] =  $row->points;
        }

        $data_results_bsit = json_encode($result_data_bsit);
        $failed_bsit = json_encode($failed_bsit);
        $passed_bsit = json_encode($passed_bsit);

        //CS
        $data_bscs = QuestionResult::select(
            \DB::raw("SUM(points) as points"),
            \DB::raw("category_text as category"))
            ->where('course', 'BSCS')
            ->groupBy('category')
            ->orderBy('category', 'ASC')
            ->get();
        $result_data_bscs = [];

        foreach($data_bscs as $row) {
            $result_data_bscs['label'][] = $row->category;
            $result_data_bscs['data'][] =  $row->points;
        }
        $user_ls = User::latest()->get();
        $result_ls = [
            $user_ls->where('ls_result','ACTIVE')->count(),
            $user_ls->where('ls_result','REFLECTIVE')->count(),
            $user_ls->where('ls_result','SENSING')->count(),
            $user_ls->where('ls_result','INTUITIVE')->count(),
            $user_ls->where('ls_result','VISUAL')->count(),
            $user_ls->where('ls_result','VERBAL')->count(),
            $user_ls->where('ls_result','SEQUENTIAL')->count(),
            $user_ls->where('ls_result','GLOBAL')->count(),
        ];

        $data_results_bscs = json_encode($result_data_bscs);
        $failed_bscs = json_encode($failed_bscs);
        $passed_bscs = json_encode($passed_bscs);

        $data_results_ls = json_encode($result_ls);

        return view('admin.dashboard.dashboard', compact('users','categories','questions','usersm',
        'usersf','r_bsit','r_bscs','data_results_bsit','failed_bsit','passed_bsit',
        'data_results_bscs','failed_bscs','passed_bscs','usersfbsit','usersmbsit','usersfbscs','usersmbscs','data_results_ls','ls_bsit','ls_bscs'));
        
    }
}
