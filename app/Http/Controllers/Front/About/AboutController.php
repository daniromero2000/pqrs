<?php

namespace App\Http\Controllers\Front\About;


use App\Http\Controllers\Controller;
class AboutController extends Controller
{
    /**
     * Show the about page.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        return view('front.about.about');
    }
}

