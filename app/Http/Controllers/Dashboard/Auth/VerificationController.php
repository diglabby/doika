<?php

namespace Diglabby\Doika\Http\Controllers\Auth;

use Diglabby\Doika\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
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
