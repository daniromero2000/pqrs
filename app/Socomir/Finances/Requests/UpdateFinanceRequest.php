<?php

namespace App\Socomir\Finances\Requests;

use App\Socomir\Base\BaseFormRequest;
use Illuminate\Validation\Rule;

class UpdateFinanceRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', Rule::unique('finances')->ignore($this->segment(3))],
        ];
    }
}
