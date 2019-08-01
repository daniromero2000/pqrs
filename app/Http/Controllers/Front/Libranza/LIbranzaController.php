<?php

namespace App\Http\Controllers\Front\Libranza;


use App\Http\Controllers\Controller;

class LibranzaController extends Controller
{
    /**
     * Show the about page.
     *
     * @return \Illuminate\Http\Response
     */
    public function libranza()
    {
        return view('front.libranza.libranza');
    }
}

