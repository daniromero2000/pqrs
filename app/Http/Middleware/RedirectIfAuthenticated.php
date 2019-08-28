<?php

namespace App\Http\Middleware;

use Closure;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Auth;
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
<<<<<<< HEAD
        auth()->guard($guard)->check();
=======
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4

        return $next($request);
    }
}
