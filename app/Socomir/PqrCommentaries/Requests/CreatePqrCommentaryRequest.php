<?php

namespace App\Socomir\PqrCommentaries\Requests;

use App\Socomir\Base\BaseFormRequest;

class CreatePqrCommentaryRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'commentary_1' => ['required']
        ];
    }
}
