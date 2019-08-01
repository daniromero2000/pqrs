<?php

namespace App\Socomir\Subsidiaries\Requests;

use App\Socomir\Base\BaseFormRequest;

class CreateSubsidiaryRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'unique:subsidiaries']
        ];
    }
}
