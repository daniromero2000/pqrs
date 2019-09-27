<?php

namespace App\Socomir\Subsidiaries\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSubsidiaryRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => ['required', Rule::unique('subsidiaries')->ignore(request()->segment(3))]
        ];
    }
}
