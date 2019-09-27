<?php

namespace App\Socomir\Admins\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:employees'],
            'password' => ['required', 'min:8'],
            'role' => ['required']
        ];
    }
}
