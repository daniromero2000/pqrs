<?php

namespace App\Model\Subsidiaries\Requests;

use App\Model\Base\BaseFormRequest;

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
