<?php

namespace App\Http\Controllers\Front\Convenios;


use App\Http\Controllers\Controller;

class ConveniosController extends Controller
{
    /**
     * Show the about page.
     *
     * @return \Illuminate\Http\Response
     */
    public function convenios()
    {
        return view('front.convenios.convenios');
    }
}

