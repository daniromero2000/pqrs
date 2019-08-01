<?php

namespace App\Http\Controllers\Front\InformacionFinanciera;


use App\Http\Controllers\Controller;

class InformacionFinancieraController extends Controller
{
    /**
     * Show the about page.
     *
     * @return \Illuminate\Http\Response
     */
    public function informacionfinanciera()
    {
        return view('front.informacionfinanciera.informacionfinanciera');
    }
}

