<?php

namespace App\Http\Controllers\Auth;

use App\Models\AffiliatedAccountService;
use App\Models\AffiliatedCompanyRole;
use App\Models\AffiliatedContentAccountService;
use App\Models\CompaniesAffiliated;
use App\Models\AfiliadoEmpresa;
use App\Models\RatingPlan;
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
            'name' => ['required', 'string','min:4', 'max:255'],
            'last_name' => ['required', 'string','min:4', 'max:255'],
            'country_id' => ['required', 'string', 'max:255'],
            'city' => ['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:afiliado_empresas'],
            //'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        //dd($data);
        session(['name_company' => 'conexiones']);
        session(['company_id' => 1]);
        $asignarNombreUsuario = false;

        $name_user = $this->name_user_affiliated($data);
        

            $afiliado_empresa = AfiliadoEmpresa::create([
                'user_name' => $name_user,
                'name' => $data['name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'country_id' => $data['country_id'],
                'department_id' => $data['department_id'],
                'city_id' => $data['city_id'],
                'city' => $data['city'],
            ]);

            $affiliated_company_role = new AffiliatedCompanyRole();
            $affiliated_company_role->affiliated_company_id = $afiliado_empresa->id;
            $affiliated_company_role->rol_id = 3;
            $affiliated_company_role->company_id = 1;
            $affiliated_company_role->save();

            $afiliado_empresa->sendWelcomeNotification($affiliated_company_role->rol_id);
            
            $free_rating_plan_id = session()->pull('free_rating_plan_id');
            $redirect_shoppingcart = session()->pull('redirect_to_shoppingcart');
        
            if(isset($free_rating_plan_id)){
                $ratingPlanFree = RatingPlan::find($free_rating_plan_id);
				if($ratingPlanFree && $ratingPlanFree->is_free) {
					$this->addFreeRatingPlan($ratingPlanFree,$afiliado_empresa);
				}
            }
            if(isset($redirect_shoppingcart)){
                $this->redirectTo = 'carrito_de_compras';
            }
            else {
                $this->redirectTo = 'conexiones/tutor';
            }
            return $afiliado_empresa;
    }


    protected function guard()
    {
        return Auth::guard('afiliadoempresa');
    }
    
    public function show_register(Request $request) {
        
        $free_rating_plan_id = $request->session()->pull('free_rating_plan_id');
		$redirect_to_shoppingcart = $request->session()->pull('redirect_to_shoppingcart');
        
        return view('auth.register',['free_rating_plan_id'=>$free_rating_plan_id, 'redirect_to_shoppingcart'=>$redirect_to_shoppingcart]);
        
    }
    
    public function addFreeRatingPlan($ratingPlanFree,$afiliado_empresa) {
        
        if($ratingPlanFree->is_free)
        if( $ratingPlanFree->moment_free_ids == null || $ratingPlanFree->moment_free_ids == '' ){
           $affiliatedAccountService = new AffiliatedAccountService();
           $affiliatedAccountService->company_affiliated_id = $afiliado_empresa->id;
           $affiliatedAccountService->rating_plan_id = $ratingPlanFree->id;
           $affiliatedAccountService->type_product_id = 1;
           $affiliatedAccountService->company_sequence_id = $ratingPlanFree->sequence_free_id;
           $affiliatedAccountService->init_date = date('Y-m-d');
           $affiliatedAccountService->end_date = date('Y-m-d', strtotime('+ '.$ratingPlanFree->days.' day'));
           $affiliatedAccountService->save();
           $affiliatedContentAccountService = new AffiliatedContentAccountService();
           $affiliatedContentAccountService->affiliated_account_service_id = $affiliatedAccountService->id;
           $affiliatedContentAccountService->type_product_id = 1;
           $affiliatedContentAccountService->sequence_id = $ratingPlanFree->sequence_free_id;
           $affiliatedAccountService->init_date = date('Y-m-d');
           $affiliatedAccountService->end_date = date('Y-m-d', strtotime('+ '.$ratingPlanFree->days.' day'));
           $affiliatedContentAccountService->save();

       }else{
           $ids = explode(',',$ratingPlanFree->moment_free_ids);
           $affiliatedAccountService = new AffiliatedAccountService();
           $affiliatedAccountService->company_affiliated_id = $afiliado_empresa->id;
           $affiliatedAccountService->rating_plan_id = $ratingPlanFree->id;
           $affiliatedAccountService->type_product_id = 2;
           $affiliatedAccountService->company_sequence_id = $ratingPlanFree->sequence_free_id;
           //$affiliatedAccountService->company_moment_id = $id;
           $affiliatedAccountService->init_date = date('Y-m-d');
           $affiliatedAccountService->end_date = date('Y-m-d', strtotime('+ '.$ratingPlanFree->days.' day'));
           $affiliatedAccountService->save();
            foreach ($ids as $id){
                $affiliatedContentAccountService = new AffiliatedContentAccountService();
                $affiliatedContentAccountService->affiliated_account_service_id = $affiliatedAccountService->id;
                $affiliatedContentAccountService->type_product_id = 1;
                $affiliatedContentAccountService->sequence_id = $ratingPlanFree->sequence_free_id;
                $affiliatedContentAccountService->moment_id = $id;
                $affiliatedContentAccountService->init_date = date('Y-m-d');
                $affiliatedContentAccountService->end_date = date('Y-m-d', strtotime('+ '.$ratingPlanFree->days.' day'));
                $affiliatedContentAccountService->save();
            }
       }
    }
}
