<?php

namespace App\Model\Admins\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeRequest extends FormRequest
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
            'employeeEmail' => ['required', 'employeeEmail', 'unique:employees'],
            'employeePassword' => ['required', 'min:8'],
            'role' => ['required']
        ];
    }
}
