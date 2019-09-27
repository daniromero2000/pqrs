<?php

namespace App\Socomir\Roles\Requests;

use App\Socomir\Base\BaseFormRequest;

class CreateRoleRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'unique:roles']
        ];
    }
}
