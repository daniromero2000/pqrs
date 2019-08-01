<?php

namespace App\Http\Controllers\Front\ProductosServicios;


use App\Http\Controllers\Controller;

class ProductosServiciosController extends Controller
{
    /**
     * Show the about page.
     *
     * @return \Illuminate\Http\Response
     */
    public function productosservicios()
    {
        return view('front.productosservicios.productosservicios');
    }
}

