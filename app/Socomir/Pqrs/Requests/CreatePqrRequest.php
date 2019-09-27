<?php

namespace App\Socomir\Pqrs\Requests;

use App\Socomir\Base\BaseFormRequest;

class CreatePqrRequest extends BaseFormRequest
{

    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email'],
            'data_politics' => ['required']
        ];
    }
}
