<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreStudentRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'contact_number' => ['required','string', 'min:8','max:11'],
            'gender' => ['required'],
            'course' => ['required'],
            'year' => ['required'],
            'section' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
}
