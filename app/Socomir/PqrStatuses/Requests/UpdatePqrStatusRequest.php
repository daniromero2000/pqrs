<?php

namespace App\Socomir\PqrStatuses\Requests;

use App\Socomir\Base\BaseFormRequest;
use Illuminate\Validation\Rule;

class UpdatePqrStatusRequest extends BaseFormRequest
{

    public function rules()
    {
        return [
            'name' => ['required']
        ];
    }
}
