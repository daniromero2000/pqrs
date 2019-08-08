<?php

namespace App\Socomir\Finances\Requests;

use App\Socomir\Base\BaseFormRequest;
use Illuminate\Validation\Rule;

class UpdateFinanceRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sku' => ['required'],
            'name' => ['required', Rule::unique('finances')->ignore($this->segment(3))],
        ];
    }
}
