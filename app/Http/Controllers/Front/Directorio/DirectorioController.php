<?php

namespace App\Http\Controllers\Front\Directorio;


use App\Http\Controllers\Controller;

class DirectorioController extends Controller
{
    /**
     * Show the about page.
     *
     * @return \Illuminate\Http\Response
     */
    public function directorio()
    {
        return view('front.directorio.directorio');
    }
}

