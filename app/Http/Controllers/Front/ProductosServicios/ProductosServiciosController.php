<?php

namespace App\Http\Controllers\Front\ProductosServicios;

use App\Http\Controllers\Controller;

class ProductosServiciosController extends Controller
{
    public function productosservicios()
    {
        return view('front.productosservicios.productosservicios');
    }
}
