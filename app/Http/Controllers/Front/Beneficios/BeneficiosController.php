<?php

namespace App\Http\Controllers\Front\Beneficios;

use App\Http\Controllers\Controller;

class BeneficiosController extends Controller
{

    public function beneficios()
    {
        return view('front.beneficios.beneficios');
    }
}
