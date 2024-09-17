<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/home';


        /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();
    
        $this->clearLoginAttempts($request);
    
        $user = $this->guard()->user();
    
        // Check if the authenticated user has a role_id of 1
        if ($user->role_id == 1) {
            // Redirect to admin home if role_id is 1
            return $request->wantsJson()
                        ? new JsonResponse([], 204)
                        : redirect()->intended('/admin/dashboard');
        }
    
        // Default redirection based on the user role
        return $request->wantsJson()
                    ? new JsonResponse([], 204)
                    : redirect()->intended($this->redirectPath());
    }
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
