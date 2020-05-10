<?php

namespace App\Http\Controllers;

use App\Models\AffiliatedCompanyRole;
use App\Models\AfiliadoEmpresa;
use App\Models\Companies;
use App\Models\ConectionAffiliatedStudents;
use App\Models\AffiliatedAccountService;
use App\Models\AffiliatedContentAccountService;
use App\Traits\CreateUserRelations;
use App\Models\ShoppingCart;
use App\Models\ShoppingCartProduct;
use App\Traits\RelationRatingPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TutorController extends Controller
{
    //
    use CreateUserRelations;
    use RelationRatingPlan;

    public function index (Request $request){
        $request->user('afiliadoempresa')->authorizeRoles(['tutor']);
        $route = route('tutor.registerStudentForm',session('name_company'));
        $tutor = AfiliadoEmpresa::find(auth('afiliadoempresa')->user()->id);
        return view('roles.tutor.index')->with('route',$route)->with('tutor',$tutor);
    }
    
    public function showRegisterStudentForm (Request $request){
        $request->user('afiliadoempresa')->authorizeRoles(['tutor']);
        return view('roles.tutor.registerStudent');
    }
    
    public function showInscriptions (Request $request){
        $request->user('afiliadoempresa')->authorizeRoles(['tutor']);
        $tutor = AfiliadoEmpresa::find(auth('afiliadoempresa')->user()->id);
        return view('roles.tutor.inscriptions')->with('tutor',$tutor);
    }
    
    public function showProducts (Request $request){
        $request->user('afiliadoempresa')->authorizeRoles(['tutor']);
        $tutor = AfiliadoEmpresa::find(auth('afiliadoempresa')->user()->id);
        return view('roles.tutor.products')->with('tutor',$tutor);
    }

    public function showHistory (Request $request){
        $request->user('afiliadoempresa')->authorizeRoles(['tutor']);
        $tutor = AfiliadoEmpresa::find(auth('afiliadoempresa')->user()->id);
        return view('roles.tutor.history')->with('tutor',$tutor);
    }
    public function showWishList(Request $request){
        $request->user('afiliadoempresa')->authorizeRoles(['tutor']);
        $tutor = AfiliadoEmpresa::find(auth('afiliadoempresa')->user()->id);
        return view('roles.tutor.wish_list')->with('tutor',$tutor);
    }
    public function register_student (Request $request) {

        $request->user('afiliadoempresa')->authorizeRoles(['tutor']);
        $rol = "student";
        $this->create_user_relation(auth('afiliadoempresa')->user(),$request,$rol);
        return redirect()->route('tutor',session('name_company' ));
    }

    public function get_students_tutor (Request $request ){

        $company = Companies::where('nick_name',session('name_company'))->first();
        $user_id = auth('afiliadoempresa')->user()->id;
        $affiliatedCompanyRole = AffiliatedCompanyRole::where([
            ['affiliated_company_id', $user_id],
            ['company_id',$company->id],
            ['rol_id',3]
        ])->first();

        $students = AfiliadoEmpresa::whereHas('affiliated_company',function($query)use($affiliatedCompanyRole,$company){
            $query->whereHas('conection_students',function($query)use($affiliatedCompanyRole){
                $query->where('tutor_company_id',$affiliatedCompanyRole->id);
            })->where('company_id',$company->id);
        })->get();

        return $students;
    }

    public function get_products_tutor(Request $request ) {

        $user_id = auth('afiliadoempresa')->user()->id;
        
        $accountServices = AffiliatedAccountService::with('affiliated_content_account_service')->
            where('affiliated_account_services.company_affiliated_id','=',$user_id)
            ->where('init_date', '<=', date('Y-m-d').' 00:00:00')
            ->where('end_date', '>=', date('Y-m-d').' 24:59:59')
            ->get();
        
        $ids = AffiliatedAccountService::with('rating_plan')
		->where('company_affiliated_id','=',$user_id)
		->where([
            ['init_date','<=',date('Y-m-d').' 00:00:00'],
            ['end_date','>=',date('Y-m-d').' 24:59:59']
        ])->pluck('id');

       return AffiliatedContentAccountService::with('sequence')->whereIn('affiliated_account_service_id',$ids)->groupBy('sequence_id')->get();
    }
	
	public function get_history_tutor(Request $request) {
		$shoppingCarts = ShoppingCart::
			with('payment_status','rating_plan', 'shopping_cart_product')->
			where([
			['company_affiliated_id', $request->user('afiliadoempresa')->id],
			['payment_status_id','!=', 1],
		])->get();
		
        $shoppingCarts = $this->relation_rating_plan($shoppingCarts);
        //return $shoppingCarts;
        return response()->json(['data' => $shoppingCarts], 200);
	}

    public function validate_password (Request $request, $company,$password){

        $afiliadoEmpresa = AfiliadoEmpresa::where([
            ['id',auth('afiliadoempresa')->user()->id],
        ])->first();

        if (!($afiliadoEmpresa === null)) {
            if(Hash::check($password,$afiliadoEmpresa->password))
                return response()->json(['validation'=>true,'message'=>'contraseña actual correcta'],200);
            else
                return response()->json(['validation'=>false,'message'=>'la contraseña actual no es correcta'],200);
        }else{
            return response()->json(['validation'=>false,'message'=>'No tiene permisos para realizar esta acción'],200);
        }

    }

    public function update_password (Request $request, $company){

        $validation = $this->validate_password($request,$company,$request->password1);
        if($validation->isSuccessful()){
            $response = json_decode($validation->content());
            if($response->validation){
                $update =  AfiliadoEmpresa::where([
                    ['id',auth('afiliadoempresa')->user()->id],
                ])->update(array('password' => Hash::make($request->password2) ));
                 if($update){
                     return response()->json(['validation'=>true,'message'=>'contraseña actualizada'],200);
                 }else{
                     return response()->json(['validation'=>false,'message'=>'Algo salio mal, intente de nuevo'],400);
                 }
            }else{
                return response()->json(['validation'=>$response->validation,'message'=>$response->message],400);
            }
        }
    }

    public function edit_column_tutor (Request $request){

        if(AfiliadoEmpresa::where('id',auth('afiliadoempresa')->user()->id)->update(array(
            $request->column => $request->data
        ))){
            return response()->json([
                'message'=>'Campo editado exitosamente',
                'column'=> $request->column,
                'data'=> $request->data
            ],200);
        }else{
            return response()->json(['message'=>'algo salio mal, intente de nuevo'],200);
        }

    }

    public function edit_image_perfil (Request $request){
        if ($request->hasFile('image'))
        {

            if ($request->file('image')->isValid())
            {
                $destinationPath = 'users/avatars/';
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileName = auth('afiliadoempresa')->user()->id.'.'.$extension;
                $request->file('image')->move($destinationPath, $fileName);

                $afiliadoempresa = AfiliadoEmpresa::find(auth('afiliadoempresa')->user()->id);
                $afiliadoempresa->url_image = asset('/users/avatars/').'/'.$fileName;
                $afiliadoempresa->save();
                return response()->json([ 'valid' => true, 'imagenNueva' => $afiliadoempresa->url_image]);
            }
            else{

                return response()->json([ 'valid' => false]);
            }

        }else{
            dd($request->all(),123);
        }


    }

}
