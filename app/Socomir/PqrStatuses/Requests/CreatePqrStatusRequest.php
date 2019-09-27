<?php

namespace App\Socomir\PqrStatuses\Requests;

use App\Socomir\Base\BaseFormRequest;

class CreatePqrStatusRequest extends BaseFormRequest
{

    public function rules()
    {
        return [
            'name' => ['required', 'unique:pqr_statuses']
        ];
    }
}
