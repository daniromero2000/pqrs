<?php

namespace App\Http\Controllers\Front\Reglamentos;

use App\Http\Controllers\Controller;

class ReglamentosController extends Controller
{

    public function reglamentos()
    {
        return view('front.reglamentos.reglamentos');
    }
}
