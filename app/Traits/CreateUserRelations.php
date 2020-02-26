<?php

namespace App\Traits;

use App\Models\AffiliatedCompanyRole;
use App\Models\AfiliadoEmpresa;
use App\Models\CompaniesAffiliated;
use App\Models\CompanyAffiliatedAssignmentUser;
use App\Models\ConectionAffiliatedStudents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

trait CreateUserRelations
{
    //
    public function create_user_relation($idUser,Request $request,$rol){
        switch ($rol){

            case 'student':

                $user_company_rol = $this->create_user($request);

                $compayAffiliated = AffiliatedCompanyRole::where([
                    ['affiliated_company_id',$idUser],
                    ['company_id',1],
                    ['rol_id',3],
                ])->first();

                $companyAffiliatedAssignmentUser = new ConectionAffiliatedStudents();
                $companyAffiliatedAssignmentUser->student_company_id = $user_company_rol->id;
                $companyAffiliatedAssignmentUser->tutor_company_id = $compayAffiliated->id;
                $companyAffiliatedAssignmentUser->save();

            break;

        }
    }

    public function create_user(Request $request){

        $aflidiadoEmpresa = new AfiliadoEmpresa();
        $user_name = $this->name_user_affiliated(array('name'=>$request->name,'last_name'=>$request->name));
        $aflidiadoEmpresa->user_name = $user_name;//$request->name;
        $aflidiadoEmpresa->name = $request->name;
        $aflidiadoEmpresa->last_name = $request->last_name;
        if(isset($request->date_birth))
            $aflidiadoEmpresa->date_birth = $request->date_birth;
        if(isset($request->password))
            $aflidiadoEmpresa->password = Hash::make($user_name);
        $aflidiadoEmpresa->save();

        $affiliated_company_role = new AffiliatedCompanyRole();
        $affiliated_company_role->affiliated_company_id = $aflidiadoEmpresa->id;
        $affiliated_company_role->rol_id = 1;//estudiante
        $affiliated_company_role->company_id = 1;//conexiones
        $affiliated_company_role->save();

        return $affiliated_company_role;

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