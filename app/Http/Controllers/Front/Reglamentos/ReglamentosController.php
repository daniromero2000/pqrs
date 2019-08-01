<?php

namespace App\Http\Controllers\Front\Reglamentos;


use App\Http\Controllers\Controller;

class ReglamentosController extends Controller
{
    /**
     * Show the about page.
     *
     * @return \Illuminate\Http\Response
     */
    public function reglamentos()
    {
        return view('front.reglamentos.reglamentos');
    }
}

