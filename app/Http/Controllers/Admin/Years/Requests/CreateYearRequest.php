<?php

namespace App\Model\Years\Requests;

use App\Model\Base\BaseFormRequest;

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
