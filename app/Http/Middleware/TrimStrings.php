<?php

namespace App\Http\Middleware;

<<<<<<< HEAD
use Illuminate\Foundation\Http\Middleware\TrimStrings as BaseTrimmer;

class TrimStrings extends BaseTrimmer
=======
use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

class TrimStrings extends Middleware
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4
{
    /**
     * The names of the attributes that should not be trimmed.
     *
     * @var array
     */
    protected $except = [
        'password',
        'password_confirmation',
    ];
}
