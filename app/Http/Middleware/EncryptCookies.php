<?php

namespace App\Http\Middleware;

<<<<<<< HEAD
use Illuminate\Cookie\Middleware\EncryptCookies as BaseEncrypter;

class EncryptCookies extends BaseEncrypter
=======
use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class EncryptCookies extends Middleware
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4
{
    /**
     * The names of the cookies that should not be encrypted.
     *
     * @var array
     */
    protected $except = [
        //
    ];
}
