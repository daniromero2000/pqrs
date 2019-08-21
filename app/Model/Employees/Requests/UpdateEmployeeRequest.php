<?php

namespace App\Model\Admins\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'employeeName' => ['required'],
            'employeeEmail' => ['required', 'email', Rule::unique('employees', 'employeeEmail')->ignore($this->segment(3))]
        ];
    }
}
