<?php

namespace App\Http\Controllers\Front\Beneficios;


use App\Http\Controllers\Controller;

class BeneficiosController extends Controller
{
    /**
     * Show the about page.
     *
     * @return \Illuminate\Http\Response
     */
    public function beneficios()
    {
        return view('front.beneficios.beneficios');
    }
}

