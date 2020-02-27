<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Models\Companies;

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
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm($companyName)
    {
        $company = Companies::where('nick_name', $companyName)->first();
        if($company) {
            return $company->nick_name === 'conexiones' ? 
            view('auth.passwords.email',['company'=>$company]) : 
            view('auth.passwords.emailCompany',['company'=>$company]) ;
        }
        else {
            return view('page500',['companies'=>Companies::all()]);
        }
            
    }
}
