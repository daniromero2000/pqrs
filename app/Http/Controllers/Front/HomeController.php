<?php

namespace App\Http\Controllers\Front;


class HomeController
{
  

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('front.index');
    }
}
