<?php

namespace App\Http\Controllers;

use App\Models\AfiliadoEmpresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AffiliatedCompanyController extends Controller
{
    //
    public function get_user(Request $request,$user_id){

        return response()->json(['data'=>AfiliadoEmpresa::find($user_id)],200);

    }

    public function edit_user_student(Request $request){
        if(isset($request->id)) {
            $user_id = $request->id;
            $tutor_id  = auth('afiliadoempresa')->user()->id;
        }
        else {
            $user_id  = auth('afiliadoempresa')->user()->id;
        }
        
        $userStudent = AfiliadoEmpresa::find($user_id);
        if($userStudent->exists()){
            $userStudent->name = $request->name;
            $userStudent->last_name = $request->last_name;
            
			if(isset($userStudent->user_name)) {
				$userStudent->user_name = $request->user_name;
				return response()->json(['user'=>$request->user_name],200);
			}
            if(isset($userStudent->birthday)) {
				$userStudent->birthday = $request->birthday;
				return response()->json(['birthday'=>$request->birthday],200);
			}
            if(isset($request->password)) {
                $userStudent->password =  Hash::make($request->password);
				return response()->json(['password'=>$request->password],200);
            }
            $userStudent->save();        }
        return response()->json(['data'=>$userStudent],200);
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
