<?php

namespace App\Traits;

use App\Mail\SendRegisterStudent;
use App\Models\AffiliatedCompanyRole;
use App\Models\AfiliadoEmpresa;
use App\Models\CompaniesAffiliated;
use App\Models\CompanyAffiliatedAssignmentUser;
use App\Models\ConectionAffiliatedStudents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

trait CreateUserRelations
{
    //
    private $user;
    public function create_user_relation($user,Request $request,$rol){
        $this->user = $user;
        switch ($rol){

            case 'student':

                $user_company_rol = $this->create_user($request);

                $compayAffiliated = AffiliatedCompanyRole::where([
                    ['affiliated_company_id',$user->id],
                    ['company_id',1],
                    ['rol_id',3],
                ])->first();

                $companyAffiliatedAssignmentUser = new ConectionAffiliatedStudents();
                $companyAffiliatedAssignmentUser->student_company_id = $user_company_rol->id;
                $companyAffiliatedAssignmentUser->tutor_company_id = $compayAffiliated->id;
                if(isset($request->kidSelected)){
                    $companyAffiliatedAssignmentUser->age_stage = $request->kidSelected;
                }
                $companyAffiliatedAssignmentUser->save();



            break;

        }
    }

    public function create_user(Request $request){

        $afiliadoEmpresa = new AfiliadoEmpresa();
        $user_name = $this->name_user_affiliated(array('name'=>$request->name,'last_name'=>$request->last_name));
        $afiliadoEmpresa->user_name = $user_name;//$request->name;
        $afiliadoEmpresa->name = $request->name;
        $afiliadoEmpresa->last_name = $request->last_name;
        if(isset($request->birthday)) {
            $afiliadoEmpresa->birthday = $request->birthday;
        }

        $afiliadoEmpresa->password = Hash::make($user_name);
        $afiliadoEmpresa->save();


         Mail::to( $this->user->email)->send(new SendRegisterStudent($afiliadoEmpresa,$this->user));

        $affiliated_company_role = new AffiliatedCompanyRole();
        $affiliated_company_role->affiliated_company_id = $afiliadoEmpresa->id;
        $affiliated_company_role->rol_id = 1;//estudiante
        $affiliated_company_role->company_id = 1;//conexiones
        $affiliated_company_role->save();

        return $affiliated_company_role;

    }

    public function name_user_affiliated($data) {

        $data['name'] = preg_split('/\s+/', $data['name'])[0];
        $data['last_name'] = preg_split('/\s+/',$data['last_name'])[0];
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