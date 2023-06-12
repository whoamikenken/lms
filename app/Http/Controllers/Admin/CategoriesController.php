<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoriesController extends Controller
{
   
    public function index()
    {
        $categories = Category::where('isRemove', false)->whereNotIn('year', ['LEARNINGSTYLE'])->latest()->get();
        return view('admin.categories.index', compact('categories'));
    }
   
    public function create()
    {
        return view('admin.categories.create');
    }

 
    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create($request->all());

        return redirect()->route('admin.categories.index');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->all());

        return redirect()->route('admin.categories.index');
    }


    public function destroy(Category $category)
    {
        $category->update([
            'isRemove' => true,
        ]);

        return back();
    }
}
