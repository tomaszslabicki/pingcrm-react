<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\HelloOnepilot;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

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
     * Show the form for the forgotten password reinitialization
     *
     * @return \Inertia\Response
     */
    public function showForgotPasswordForm(){
        return Inertia::render('Auth/ForgotPassword');
    }

    /**
     * For now just sending an email when forgotten password post request is sent
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleForgottenPasswordRequest(Request $request){
        // TODO : Some processing of reinitializing of the user's password

        Mail::to($request->input('email'))->send(new HelloOnepilot);
        return redirect()->route('login')->with('message', 'We did it.');
    }
}
