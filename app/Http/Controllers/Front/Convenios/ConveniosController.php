<?php

namespace App\Http\Controllers\Front\Convenios;

use App\Http\Controllers\Controller;

class ConveniosController extends Controller
{

    public function convenios()
    {
        return view('front.convenios.convenios');
    }
}
