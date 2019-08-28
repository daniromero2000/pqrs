<?php

namespace App\Http\Controllers\Auth;

<<<<<<< HEAD
use App\Socomir\Admins\Requests\LoginRequest;
=======
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
<<<<<<< HEAD
    protected $redirectTo = '/accounts?tab=profile';
=======
    protected $redirectTo = '/home';
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4

    /**
     * Create a new controller instance.
     *
<<<<<<< HEAD
=======
     * @return void
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
<<<<<<< HEAD

    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Login the admin
     *
     * @param LoginRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(LoginRequest $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $details = $request->only('email', 'password');
        $details['status'] = 1;
        if (auth()->attempt($details)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }
=======
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4
}
