<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AffiliatedCompanyRole;
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
        $this->rol = decrypt($rol);
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
        //return redirect($redirec,['empresa'=>'conexiones']);
        return redirect()->route($redirec, ['empresa' => 'conexiones']);
    }
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProviderGmail($rol)
    {
        $this->rol = decrypt($rol);
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
        return redirect()->route($redirec, ['empresa' => 'conexiones']);
    }

    public function createAfiliado($user,$tipoProvider){
        ($tipoProvider === 'gmail')?
            $afiliadoempresa = AfiliadoEmpresa::where('provaider_google',$user->id)->first():
            $afiliadoempresa = AfiliadoEmpresa::where('provaider_facebook',$user->id)->first()
        ;
        if($afiliadoempresa === null){
            $afiliadoempresa = new AfiliadoEmpresa();
            $dataProvider = explode( ' ', $user->name);
            $data =['name'=>$dataProvider[0],'last_name'=>$dataProvider[1]];
            $afiliadoempresa->user_name = $this->name_user_affiliated($data);
            $afiliadoempresa->name = $dataProvider[0];
            $afiliadoempresa->last_name = $dataProvider[1];
            $afiliadoempresa->email = $user->email;
            ($tipoProvider === 'gmail')?
                $afiliadoempresa->provaider_google = $user->id:
                $afiliadoempresa->provaider_facebook = $user->id;
            $afiliadoempresa->save();
            $affiliated_company_role = new AffiliatedCompanyRole();
            $affiliated_company_role->affiliated_company_id = $afiliadoempresa->id;
            $affiliated_company_role->rol_id = 3;//tutor
            $affiliated_company_role->company_id = 1;//conexiones
            $affiliated_company_role->save();
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

    public function name_user_affiliated($data) {

        $name_user = $data['name'].$data['last_name'].'C';
        $asignarNombreUsuario = false;
        do{
            if( count(AfiliadoEmpresa::where('user_name',$name_user)->get()) ){
                $name_user = $name_user.rand (0,9);
            }else{
                $asignarNombreUsuario = true;
            }
        }while(!$asignarNombreUsuario);


        return $name_user;

    }
}
