<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AfiliadoEmpresa;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Laravel\Socialite\Facades\Socialite;

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

    private $rol = null;
    private $redirectTo = '/';
    /**
     * Where to redirect users after login.
     *
     * @var string
     */


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
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($rol)
    {
        $this->rol = Crypt::decryptString($rol);
        $this->rolLogin();
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->stateless()->user();

        $afiliadoempresa = $this->createAfiliado($user);

        Auth::guard('afiliadoempresa')->login($afiliadoempresa);
        return redirect($this->redirectTo);
    }
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProviderGmail($rol)
    {
        $this->rol = Crypt::decrypt($rol);
        $this->rolLogin();
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallbackGmail()
    {
        $user = Socialite::driver('google')->stateless()->user();

        $afiliadoempresa = $this->createAfiliado($user);

        Auth::guard('afiliadoempresa')->login($afiliadoempresa);
        return redirect($this->redirectTo);
    }

    public function createAfiliado($user){
        $afiliadoempresa = AfiliadoEmpresa::where('provaider_id',$user->id)->first();
        if($afiliadoempresa === null){
            $afiliadoempresa = new AfiliadoEmpresa();
            $afiliadoempresa->nombre = $user->name;
            $afiliadoempresa->correo = $user->email;
            $afiliadoempresa->provaider_id = $user->id;
            $afiliadoempresa->save();
        }
        return $afiliadoempresa;
    }

    public function rolLogin(){
        switch ($this->rol){
            case 1:
                //dd('estudiante');
                $this->redirectTo = "estudiante";
                break;
            case 2:
                //dd('tutor');
                $this->redirectTo = "tutor";
                break;
            case 3:
                //dd('profesor');
                $this->redirectTo = "teacher";
                break;
        }
    }
}
