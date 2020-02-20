<?php

namespace App\Http\Controllers\Auth;

use App\Models\AffiliatedCompanyRole;
use App\Models\CompaniesAffiliated;
use App\Models\AfiliadoEmpresa;
use App\Traits\CreateUserRelations;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    use CreateUserRelations;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            //'user_name' => ['required', 'string', 'max:255','unique:afiliado_empresas'],
            //'name' => ['required', 'string','min:4', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            //'email' => ['required', 'string', 'email', 'max:255', 'unique:afiliado_empresas'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        session(['name_company' => 'conexiones']);

        $asignarNombreUsuario = false;
        $name_user = $this->name_user_affiliated($data);

        //if($asignarNombreUsuario){
            $afiliado_empresa = AfiliadoEmpresa::create([
                'user_name' => $name_user,
                'name' => $data['user_name'],
                'last_name' => $data['user_name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'country_id' => 42,
                'department_id' => 11,
                'city_id' => 149,
            ]);

            $companies_affiliated = new CompaniesAffiliated();
            $companies_affiliated->company_id = 1;
            $companies_affiliated->affiliated_id = $afiliado_empresa->id;
            $companies_affiliated->save();

            $affiliated_company_role = new AffiliatedCompanyRole();
            $affiliated_company_role->affiliated_company_id = $companies_affiliated->id;
            $affiliated_company_role->rol_id = 3;
            $affiliated_company_role->save();

            $this->redirectTo = 'conexiones/tutor';

            return $afiliado_empresa;
        //}


    }


    protected function guard()
    {
        return Auth::guard('afiliadoempresa');
    }
}
