<?php

namespace App\Http\Controllers\Front\Pqr;


use App\Http\Controllers\Controller;

class PqrController extends Controller
{
    /**
     * Show the about page.
     *
     * @return \Illuminate\Http\Response
     */
    public function pqr()
    {
        return view('front.pqr.pqr');
    }
}

