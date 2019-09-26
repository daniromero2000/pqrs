<?php

namespace App\Socomir\Finances\Requests;

use App\Socomir\Base\BaseFormRequest;

class CreateFinanceRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required'],
            'cover' => ['required', 'file', 'mimes:pdf']
        ];
    }
}
