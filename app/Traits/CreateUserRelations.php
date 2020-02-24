<?php

namespace App\Traits;

use App\Models\AffiliatedCompanyRole;
use App\Models\AfiliadoEmpresa;
use App\Models\CompaniesAffiliated;
use App\Models\CompanyAffiliatedAssignmentUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

trait CreateUserRelations
{
    //
    public function create_user_relation($idUser,Request $request,$rol){
        //dd('ingresa');
        switch ($rol){

            case 'student':

                $user = $this->create_user($request);
                $compayAffiliated = CompaniesAffiliated::where([
                    ['affiliated_id',$idUser],
                    ['company_id',1]
                ])->first();

                $companyAffiliatedAssignmentUser = new CompanyAffiliatedAssignmentUser();
                $companyAffiliatedAssignmentUser->company_affiliated_id = $compayAffiliated->id;
                $companyAffiliatedAssignmentUser->affiliated_id = $user->id;
                $companyAffiliatedAssignmentUser->save();

            break;

        }
    }

    public function create_user(Request $request){

        $aflidiadoEmpresa = new AfiliadoEmpresa();
        $user_name = $this->name_user_affiliated(array('user_name'=>$request->name));
        $aflidiadoEmpresa->user_name = $user_name;//$request->name;
        $aflidiadoEmpresa->name = $request->name;
        $aflidiadoEmpresa->last_name = $request->last_name;
        $aflidiadoEmpresa->date_birth = $request->date_birth;
        $aflidiadoEmpresa->password = Hash::make($user_name);
        $aflidiadoEmpresa->save();

        $companies_affiliated = new CompaniesAffiliated();
        $companies_affiliated->company_id = 1;//conexiones
        $companies_affiliated->affiliated_id = $aflidiadoEmpresa->id;
        $companies_affiliated->save();

        $affiliated_company_role = new AffiliatedCompanyRole();
        $affiliated_company_role->affiliated_company_id = $companies_affiliated->id;
        $affiliated_company_role->rol_id = 1;//estudiante
        $affiliated_company_role->save();

        return $aflidiadoEmpresa;

    }

    public function name_user_affiliated($data) {

        $name_user = $data['name'].$data['last_name'].'C';
		do{
            if( count(AfiliadoEmpresa::where('user_name',$name_user)->get()) ){
                $name_user = $name_user.rand (0,9);
				$asignarNombreUsuario = false;
            }else{
                $asignarNombreUsuario = true;
            }
        }while(!$asignarNombreUsuario);


        return $name_user;

    }
}