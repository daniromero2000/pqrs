<?php

namespace App\Http\Controllers\Front\Directorio;

use App\Socomir\Employees\Employee;
use App\Http\Controllers\Controller;
use App\Socomir\Subsidiaries\Subsidiary;

class DirectorioController extends Controller
{
    public function directorio()
    {
        return view('front.directorio.directorio', [
            'employees' => Employee::with('subsidiary')->where('status', 0)->get(),
            'subsidiaries' => Subsidiary::all()
        ]);
    }
}
