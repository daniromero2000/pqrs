<?php

namespace App\Socomir\Years\Requests;

use App\Socomir\Base\BaseFormRequest;

class CreateYearRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'year' => ['required', 'unique:years']
        ];
    }
}
