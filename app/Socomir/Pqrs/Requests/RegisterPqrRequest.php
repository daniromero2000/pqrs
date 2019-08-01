<?php

namespace App\Socomir\Pqrs\Requests;

use App\Socomir\Base\BaseFormRequest;

class RegisterPqrRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            // 'email' => 'required|string|email|max:255|unique:pqrs',
            'password' => 'required|string|min:8|confirmed',
            'data_politics' => ['required'],
            'g-recaptcha-response' => 'required|captcha'
        ];
    }
}
