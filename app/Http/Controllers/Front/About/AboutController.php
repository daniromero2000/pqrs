<?php

namespace App\Http\Controllers\Front\About;

use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function about()
    {
        return view('front.about.about');
    }
}
