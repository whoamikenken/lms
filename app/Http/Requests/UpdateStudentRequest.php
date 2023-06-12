<?php

namespace App\Http\Requests;

use App\Category;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateStudentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'student_no' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', ],
            'gender' => ['required'],
            'course' => ['required'],
            'year' => ['required'],
            'section' => ['required'],
            'password'  => ['nullable'],
        ];
    }
}
