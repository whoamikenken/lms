<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RoleUser;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Support\Facades\Hash;

class StudentsController extends Controller
{
   
    public function index()
    {
        $students = User::whereNotIn('id', [1])->where('isRemove', false)->latest()->get();
        return view('admin.students.index', compact('students')); 
    }
   
    public function create()
    {
        return view('admin.students.create');
    }

 
    public function store(StoreStudentRequest $request)
    {
        $student = User::create([
            'name'  => $request->input('name'),
            'student_no'  => $request->input('student_no'),
            'email'  => $request->input('email'),
            'gender'  => $request->input('gender'),
            'course'  => $request->input('course'),
            'year'  => $request->input('year'),
            'section'  => $request->input('section'),
            'password' => Hash::make(strtoupper($request->input('name'))),
        ]);
        RoleUser::insert([
            'user_id' => $student->id,
            'role_id' => 2,
        ]);

        return redirect()->route('admin.students.index');
    }

 

    public function edit(User $student)
    {
        return view('admin.students.edit', compact('student'));
    }

    public function update(UpdateStudentRequest $request, User $student)
    {
        $student->update([
            'name'  => $request->input('name'),
            'student_no'  => $request->input('student_no'),
            'email'  => $request->input('email'),
            'gender'  => $request->input('gender'),
            'course'  => $request->input('course'),
            'year'  => $request->input('year'),
            'section'  => $request->input('section'),
            'password' => Hash::make($request->input('password'))
        ]);

        return redirect()->route('admin.students.index');
    }


    public function destroy(User $student)
    {
        $student->update([
            'isRemove'  => true,
        ]);

        return back();
    }
}
