<?php

namespace App\Socomir\Finances\Requests;

use App\Socomir\Base\BaseFormRequest;

class CreateFinanceRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'name' => ['required'],
            'cover' => ['required', 'file', 'mimes:pdf']
        ];
    }
}
