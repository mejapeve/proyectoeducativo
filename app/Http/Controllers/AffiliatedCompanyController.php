<?php

namespace App\Http\Controllers;

use App\Models\AfiliadoEmpresa;
use App\Models\ConectionAffiliatedStudents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AffiliatedCompanyController extends Controller
{
    //
    public function get_user(Request $request,$user_id){

        $afiliadoEmpresa = AfiliadoEmpresa::find($user_id);
        $age_stage = ConectionAffiliatedStudents::select('age_stage')->where(function($query)use($afiliadoEmpresa){
            $query->where('student_company_id',$afiliadoEmpresa->affiliated_company->where(
                'rol_id',1
            )->where('company_id',1)->first()->id);
        })->first();
        return response()->json(['data'=>$afiliadoEmpresa,
            'age_stage'=>$age_stage],200);
    }
    public function edit_user_student(Request $request){
        if(auth('afiliadoempresa')->user()){
            if(isset($request->id)) {
                $userTutor = AfiliadoEmpresa::with('affiliated_company')
                    ->whereHas('affiliated_company',function($query){
                        $query->where([
                            ['rol_id',3],//tutor-familiar
                            ['company_id',1]//conexiones
                        ]);
                    })->find(auth('afiliadoempresa')->user()->id);
                if($userTutor->exists()){
                    $userStudent = AfiliadoEmpresa::whereHas('affiliated_company',function($query)use($userTutor){
                        $query->whereHas('conection_students',function($query)use($userTutor){
                            $query->where('tutor_company_id',$userTutor->affiliated_company[0]->id);
                        })->where('rol_id',1);
                    })->find($request->id);
                    if($userStudent->exists()){
                        $userStudent->name = $request->name;
                        $userStudent->last_name = $request->last_name;
                        if(isset($request->user_name)) {
                            $exist = AfiliadoEmpresa::where('user_name',$request->user_name)->where('id','!=',$userStudent->id)->first();
                            if($exist === null) {
                                $userStudent->user_name = $request->user_name;
                            }else{
                                return response()->json(['data'=>'','message','El nombre de usuario ya esta en uso'],200);
                            }
                        }
                        if(isset($request->birthday)) {
                            $userStudent->birthday = $request->birthday;
                        }
                        if(isset($request->password)) {
                            $userStudent->password =  Hash::make($request->password);
                        }
                        if(isset($request->kidSelected)){
                            ConectionAffiliatedStudents::
                            where('student_company_id',$userStudent->affiliated_company->where(
                                'rol_id',1
                            )->where('company_id',1)->first()->id)->update(array(
                                'age_stage' => $request->kidSelected,
                            ));
                        }
                        $userStudent->save();
                        return response()->json(['data'=>$userStudent],200);
                    }
                    return response()->json(['data'=>'','message'=>'El usario ha editar no se encuentra'],200);
                }
                return response()->json(['data'=>'','message'=>'No tiene permiso para realizar esta acción'],200);
            }else{
                $userStudent = AfiliadoEmpresa::find(auth('afiliadoempresa')->user()->id);
                if($userStudent->exists()){
                    $userStudent->name = $request->name;
                    $userStudent->last_name = $request->last_name;
                    if(isset($request->user_name)) {
                        $exist = AfiliadoEmpresa::where('user_name',$request->user_name)->first();
                        if($exist === null) {
                            $userStudent->user_name = $request->user_name;
                        }else{
                            return response()->json(['data'=>'','message','El nombre de usuario ya esta en uso'],200);
                        }
                    }
                    if(isset($request->birthday)) {
                        $userStudent->birthday = $request->birthday;
                    }
                    if(isset($request->password)) {
                        $userStudent->password =  Hash::make($request->password);
                        $request->session()->put([
                            'password_hash' => $userStudent->password,
                        ]);

                    }
                    if(isset($request->kidSelected)){
                        ConectionAffiliatedStudents::
                        where('student_company_id',$userStudent->affiliated_company->where(
                            'rol_id',1
                        )->where('company_id',1)->first()->id)->update(array(
                            'age_stage' => $request->kidSelected,
                        ));
                    }
                    $userStudent->save();

                    return response()->json(['data'=>$userStudent],200);
                }
                return response()->json(['data'=>'','message'=>'El usario ha editar no se encuentra'],200);
            }
        }
        return response()->json(['data'=>'','message'=>'No tiene una sesión activa'],200);

    }

    public function validate_user_name (Request $request, $userName){

       $exist = AfiliadoEmpresa::where('user_name',$userName)->get();
       if(count($exist)){
           return response()->json(['data'=>false],200);
       }else{
           return response()->json(['data'=>true],200);
       }
    }

}
