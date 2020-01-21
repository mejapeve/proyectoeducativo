<?php
/*
namespace App\Http\Controllers\Auth\Login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
*/

namespace App\Http\Controllers\Auth\Login;
use App\Models\Empresas;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController as DefaultLoginController;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;

class AfiliadoEmpresaController extends DefaultLoginController

{
    //
    //protected $redirectTo = '/employee/home';
    public function __construct()
    {
        $this->middleware('guest:afiliadoempresa')->except('logout');
    }
    public function showLoginForm( $empresa = "conexiones" )
    {

        if(count(Empresas::where('nombre',$empresa)->get())){
            return view('auth.login.afiliadoEmpresa');
        }else{
            return 'empresa no existe';
        }

    }
    public function username()
    {
        return 'correo';
    }
    protected function guard()
    {
        return Auth::guard('afiliadoempresa');
    }

    public function redirect(){
        //return Socialite::driver
        return Socialite::driver('facebook')->stateless()->user();
    }

    public function callback(){
        $user = Socialite::driver('facebook')->user();
        return $user->getAvatar();
    }

    public function login(Request $request,$rol)
    {

        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {

           // $this->rolLogin(intval($rol));

            return $this->sendLoginResponse($request,$rol);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    protected function sendLoginResponse(Request $request,$rol)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);
        switch ($rol){
            case 1:
                $redirectTo = "student";
                break;
            case 2:
                $redirectTo = "teacher";
                break;
            case 3:
                $redirectTo = "tutor";
                break;
        }
        return $this->authenticated($request, $this->guard()->user())
            ?: redirect()->intended($redirectTo);
    }


}
