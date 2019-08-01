<?php
namespace App\Socomir\PqrStatuses\Requests;

use App\Socomir\Base\BaseFormRequest;
use Illuminate\Validation\Rule;

class UpdatePqrStatusRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required']
        ];
    }
}
