<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyResultRequest;
use App\Http\Requests\StoreResultRequest;
use App\Http\Requests\UpdateResultRequest;
use App\Models\Question;
use App\Models\Result;
use App\Models\User;
use App\Models\Category;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ResultsController extends Controller
{
    public function index()
    {
       
        $results = Result::all();

        return view('admin.results.index', compact('results'));
    }

    public function item_analysis(){
        $categories = Category::where('isRemove', false)->whereNotIn('year', ['LEARNINGSTYLE'])->with(['categoryQuestions' => function ($query) {
            $query->inRandomOrder()
                ->with(['questionOptions' => function ($query) {
                    $query->inRandomOrder();
                }]);
        }])
            ->whereHas('categoryQuestions')
            ->get();
        
        $categoriesLS = Category::where('isRemove', false)->where('year', ['LEARNINGSTYLE'])->with(['categoryQuestions' => function ($query) {
                $query->inRandomOrder()
                    ->with(['questionOptions' => function ($query) {
                        $query->inRandomOrder();
                    }]);
            }])
                ->whereHas('categoryQuestions')
                ->get();
        
        $category_first =  $categories->first();

        return view('admin.results.item_analysis', compact('categories','categoriesLS','category_first'));
    }

    
}
