<?php

namespace App\Socomir\Roles\Requests;

use App\Socomir\Base\BaseFormRequest;

class UpdateRoleRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'display_name' => ['required'],
            'roles' => ['array']
        ];
    }
}
