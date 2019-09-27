<?php

namespace App\Http\Controllers\Front\InformacionFinanciera;

use App\Http\Controllers\Controller;

class InformacionFinancieraController extends Controller
{

    public function informacionfinanciera()
    {
        return view('front.informacionfinanciera.informacionfinanciera');
    }
}
