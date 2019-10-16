<?php

namespace App\Socomir\lead\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateLeadsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email']
        ];
    }
}
