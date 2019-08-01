<?php

namespace App\Http\Controllers\Front\Asociarse;


use App\Http\Controllers\Controller;
class AsociarseController extends Controller
{
    /**
     * Show the about page.
     *
     * @return \Illuminate\Http\Response
     */
    public function asociarse()
    {
        return view('front.asociarse.asociarse');
    }
}

