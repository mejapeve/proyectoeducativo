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

class AfiliadoEmpresaController extends DefaultLoginController

{
    //
    protected $redirectTo = '/employee/home';
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
}
