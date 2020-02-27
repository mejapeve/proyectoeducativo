<?php
/*
namespace App\Http\Controllers\Auth\Login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
*/

namespace App\Http\Controllers\Auth\Login;
use App\Models\Companies;
use App\Models\Empresas;
use App\Models\AfiliadoEmpresa;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController as DefaultLoginController;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use DB;

class AffiliatedCompanyController extends DefaultLoginController

{
    use Notifiable;

    protected $username;

    public function __construct()
    {
        $this->middleware('guest:afiliadoempresa')->except('logout');
        $this->username = $this->type_validation();
    }

    public function type_validation (){
        $login = \request()->input('user_name');
        $fieldType = filter_var($login,FILTER_VALIDATE_EMAIL)?'email':'user_name';
        \request()->merge([$fieldType=>$login]);
        return $fieldType;
    }

    public function index(){
        //return redirect('auth.login.afiliadoEmpresa');
    }

    public function username()
    {
        return $this->username;
    }

    public function showLoginForm( $empresa = "conexiones" )
    {
        if(count(Companies::where('nick_name',$empresa)->get())){
            session(['name_company' => $empresa]);
            return redirect()->route('loginform',['empresa'=> $empresa]);
        }else{
            return 'empresa no existe';
        }

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

        $user_name = $request->user_name;
        $company = $request->company;
        
        Auth::logout();
        
        $user = DB::table('afiliado_empresas')
                  ->join('affiliated_company_roles', 'afiliado_empresas.id', '=', 'affiliated_company_roles.affiliated_company_id')
                  ->where(function ($q) use ($user_name){
                    $q->where('afiliado_empresas.user_name',$user_name)
                    ->orWhere('afiliado_empresas.email',$user_name);
                    })
                  ->where('affiliated_company_roles.rol_id',$rol)
                  ->where('affiliated_company_roles.company_id',$company)
				  ->select('afiliado_empresas.id')
                  ->first();
        if($user){
            $this->validateLogin($request);

            if (method_exists($this, 'hasTooManyLoginAttempts') &&
                $this->hasTooManyLoginAttempts($request)) {
                $this->fireLockoutEvent($request);
    
                return $this->sendLockoutResponse($request);
            }
    
            if ($this->attemptLogin($request)) {
    
                return $this->sendLoginResponse($request,$rol);
            }
    
            // If the login attempt was unsuccessful we will increment the number of attempts
            // to login and redirect the user back to the login form. Of course, when this
            // user surpasses their maximum number of attempts they will get locked out.
            $this->incrementLoginAttempts($request);
    
            return $this->sendFailedLoginResponse($request);
        }
        else {
            return $this->sendFailedLoginResponse($request);
        }
                  

        
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
            case 4:
                $redirectTo = "admin";
                session(['name_company' => 'conexiones']);
                break;
        }

        return $this->authenticated($request, $this->guard()->user())
            ?: redirect()->route($redirectTo,session('name_company' ));
    }


}
