<?php

namespace App\Model\Roles\Requests;

use App\Model\Base\BaseFormRequest;

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
