<?php

namespace App\Http\Controllers\Front\Libranza;

use App\Http\Controllers\Controller;

class LibranzaController extends Controller
{
    public function libranza()
    {
        return view('front.libranza.libranza');
    }
}
