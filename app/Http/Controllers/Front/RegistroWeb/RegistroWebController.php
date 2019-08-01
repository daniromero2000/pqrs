<?php

namespace App\Http\Controllers\Front\RegistroWeb;


use App\Http\Controllers\Controller;

class RegistroWebController extends Controller
{
    /**
     * Show the about page.
     *
     * @return \Illuminate\Http\Response
     */
    public function registroweb()
    {
        return view('front.registroweb.registroweb');
    }
}

