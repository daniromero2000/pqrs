<?php

namespace App\Socomir\lead\Requests;

use App\Socomir\Base\BaseFormRequest;

class RegisterLeadsRequest extends BaseFormRequest
{

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
