<?php

namespace App\Socomir\Roles\Requests;

use App\Socomir\Base\BaseFormRequest;

class UpdateRoleRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'display_name' => ['required'],
            'roles' => ['array']
        ];
    }
}
