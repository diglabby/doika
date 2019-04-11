<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\View\View;

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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form
     */
    public function showLoginForm(): View
    {
        return view('dashboard.pages.auth.login');
    }

    /**
     * Get the post register / login redirect path.
     * @see \Illuminate\Foundation\Auth\RedirectsUsers::redirectPath
     * @return string
     */
    protected function redirectTo(): string
    {
        return route('dashboard.home');
    }
}
