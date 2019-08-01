<?php

namespace App\Http\Controllers\Front\Tarifas;


use App\Http\Controllers\Controller;

class TarifasController extends Controller
{
    /**
     * Show the about page.
     *
     * @return \Illuminate\Http\Response
     */
    public function tarifas()
    {
        return view('front.tarifas.tarifas');
    }
}

