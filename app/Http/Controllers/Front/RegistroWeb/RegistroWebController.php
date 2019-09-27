<?php

namespace App\Http\Controllers\Front\RegistroWeb;

use App\Http\Controllers\Controller;

class RegistroWebController extends Controller
{

    public function registroweb()
    {
        return view('front.registroweb.registroweb');
    }
}
