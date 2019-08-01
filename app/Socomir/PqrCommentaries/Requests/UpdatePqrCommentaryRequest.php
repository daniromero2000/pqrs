<?php

namespace App\Socomir\PqrCommentaries\Requests;

use App\Socomir\Base\BaseFormRequest;

class UpdatePqrCommentaryRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'commentary_1' => ['required']
        ];
    }
}
