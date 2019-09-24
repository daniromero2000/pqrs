<?php

namespace App\Http\Controllers\Front\Directorio;

use App\Socomir\Employees\Employee;


use App\Http\Controllers\Controller;

class DirectorioController extends Controller
{
    /**
     * Show the about page.
     *
     * @return \Illuminate\Http\Response
     */
    public function directorio()
    {

        $employees = Employee::all();
      

        return view('front.directorio.directorio', [
            'employees' => $employees
        ]);
    }
}
