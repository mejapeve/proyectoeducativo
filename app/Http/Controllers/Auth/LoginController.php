<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AfiliadoEmpresa;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
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
    use RegistersUsers;

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
        session(['redirec' => $this->redirectTo]);
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

        $afiliadoempresa = $this->createAfiliado($user,'facebook');
        $redirec = session('redirec');
        Auth::guard('afiliadoempresa')->login($afiliadoempresa);
        return redirect($redirec);
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
        session(['redirec' => $this->redirectTo]);
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

        $afiliadoempresa = $this->createAfiliado($user,'gmail');
        $redirec = session('redirec');
        Auth::guard('afiliadoempresa')->login($afiliadoempresa);
        return redirect($redirec);
    }

    public function createAfiliado($user,$tipoProvider){
        ($tipoProvider === 'gmail')?
            $afiliadoempresa = AfiliadoEmpresa::where('provaider_facebook',$user->id)->first():
            $afiliadoempresa = AfiliadoEmpresa::where('provaider_google',$user->id)->first()
        ;

        if($afiliadoempresa === null){
            $afiliadoempresa = new AfiliadoEmpresa();
            $dataProvider = explode( ' ', $afiliadoempresa->name);
            $data =['name'=>$dataProvider[0],'last_name'=>$dataProvider[1]];
            $afiliadoempresa->name_user = $this->name_user_affiliated($data);
            $afiliadoempresa->name = $dataProvider[0];
            $afiliadoempresa->last_name = $dataProvider[1];
            $afiliadoempresa->email = $user->email;
            $afiliadoempresa->provaider_id = $user->id;
            $afiliadoempresa->save();
        }
        return $afiliadoempresa;
    }

    public function rolLogin(){
        switch ($this->rol){
            case 1:
                $this->redirectTo = "student";
                break;
            case 2:
                $this->redirectTo = "teacher";
                break;
            case 3:
                $this->redirectTo = "tutor";
                break;
        }
    }
}
