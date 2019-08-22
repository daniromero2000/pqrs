<?php

namespace App\Http\Controllers\Front\Estatutos;


use App\Http\Controllers\Controller;

class EstatutosController extends Controller
{
    /**
     * Show the about page.
     *
     * @return \Illuminate\Http\Response
     */
    public function estatutos()
    {
        return view('front.estatutos.estatutos');
    }
}

