<?php

namespace App\Socomir\Lead\Requests;

use App\Socomir\Base\BaseFormRequest;

class CreateLeadsRequest extends BaseFormRequest
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
