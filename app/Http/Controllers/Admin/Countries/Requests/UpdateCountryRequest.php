<?php

<<<<<<< HEAD
namespace App\Socomir\Countries\Requests;
=======
namespace App\Model\Countries\Requests;
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4

use Illuminate\Foundation\Http\FormRequest;

class UpdateCountryRequest extends FormRequest
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
            'iso' => ['max:2'],
            'iso3' => ['max:3'],
            'numcode' => ['numeric'],
            'phonecode' => ['numeric']
        ];
    }
}
