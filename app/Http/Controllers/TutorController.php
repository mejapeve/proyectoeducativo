<?php

namespace App\Http\Controllers;

use App\Models\AffiliatedCompanyRole;
use App\Models\AfiliadoEmpresa;
use App\Models\Companies;
use App\Models\ConectionAffiliatedStudents;
use App\Traits\CreateUserRelations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TutorController extends Controller
{
    //
    use CreateUserRelations;

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

}
