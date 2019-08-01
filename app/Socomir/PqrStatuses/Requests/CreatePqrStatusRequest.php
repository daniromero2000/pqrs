<?php

namespace App\Socomir\PqrStatuses\Requests;

use App\Socomir\Base\BaseFormRequest;

class CreatePqrStatusRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'unique:pqr_statuses']
        ];
    }
}
