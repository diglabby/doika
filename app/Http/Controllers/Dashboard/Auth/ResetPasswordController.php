<?php

namespace Diglabby\Doika\Http\Controllers\Auth;

use Diglabby\Doika\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get the post register / login redirect path.
     *
     * @see \Illuminate\Foundation\Auth\RedirectsUsers::redirectPath
     *
     * @return string
     */
    protected function redirectTo(): string
    {
        return route('dashboard.home');
    }

    /**
     * {@inheritdoc}
     *
     * @see \Illuminate\Foundation\Auth\ResetsPasswords::showResetForm
     */
    public function showResetForm(Request $request, $token = null)
    {
        return view('dashboard.pages.auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->get('email')]
        );
    }
}
