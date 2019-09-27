<?php

namespace App\Http\Controllers\Front\Estatutos;

use App\Http\Controllers\Controller;

class EstatutosController extends Controller
{
    public function estatutos()
    {
        return view('front.estatutos.estatutos');
    }
}
