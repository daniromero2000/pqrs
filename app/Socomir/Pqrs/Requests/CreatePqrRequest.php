<?php

namespace App\Socomir\Pqrs\Requests;

use App\Socomir\Base\BaseFormRequest;

class CreatePqrRequest extends BaseFormRequest
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
            'email' => ['required', 'email', 'unique:pqrs'],
            'password' => ['required', 'min:8'],
        ];
    }
}
