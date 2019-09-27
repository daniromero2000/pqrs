<?php

namespace App\Socomir\Subsidiaries\Requests;

use App\Socomir\Base\BaseFormRequest;

class CreateSubsidiaryRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'unique:subsidiaries']
        ];
    }
}
