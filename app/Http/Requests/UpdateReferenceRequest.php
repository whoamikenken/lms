<?php

namespace App\Http\Requests;

use App\Category;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateReferenceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'reference' => [
                'required',
            ],
            'link' => ['required'],
        ];
    }
}
