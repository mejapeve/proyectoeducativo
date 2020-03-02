<?php

namespace App\Http\Controllers;

use App\Models\AffiliatedCompanyRole;
use App\Models\AfiliadoEmpresa;
use App\Models\Companies;
use App\Models\ConectionAffiliatedStudents;
use App\Traits\CreateUserRelations;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    //
    use CreateUserRelations;

    public function index (Request $request){
        $request->user('afiliadoempresa')->authorizeRoles(['tutor']);
        return view('roles.tutor.index');
    }
	
    public function showProfile (Request $request){
        $request->user('afiliadoempresa')->authorizeRoles(['tutor']);
        return view('roles.tutor.profile');
    }

    public function showRegisterStudentForm (Request $request){
        $request->user('afiliadoempresa')->authorizeRoles(['tutor']);
        return view('roles.tutor.registerStudent');
    }

    public function register_student (Request $request) {

        $request->user('afiliadoempresa')->authorizeRoles(['tutor']);
        $rol = "student";
        $this->create_user_relation(auth('afiliadoempresa')->user()->id,$request,$rol);

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

}
