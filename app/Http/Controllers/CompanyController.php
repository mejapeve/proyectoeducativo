<?php

namespace App\Http\Controllers;

use App\Models\AffiliatedCompanyRole;
use App\Models\AfiliadoEmpresa;
use App\Models\Companies;
use App\Models\CompanyGroup;
use App\Models\CompanySequence;
use Illuminate\Http\Request;
use DB;

class CompanyController extends Controller
{
    //

    public function get_companies(){

        return response()->json(
            ['data'=> Companies::all()],
            200
        );

    }

    public function get_company_sequences (Request $request,$company_id) {
        
        return CompanySequence::with('moments','moments.experiences','moments.moment_kit.kit.kit_elements.element','moments.moment_kit.element')->where('company_id',$company_id)
            ->where(function ($query) {
                $dt = new \DateTime();
                $query->where('expiration_date','>',$dt->format('Y-m-d H:i:s'))
                    ->orWhereNull('expiration_date');
            })->get();
    }

    public function get_company_groups (Request $request,$company_id){

        return CompanyGroup::where('company_id',$company_id)->get();

    }

    public function get_teachers_company (Request $request,$company_id){
   
        return DB::table('afiliado_empresas')
                  ->join('affiliated_company_roles', 'afiliado_empresas.id', '=', 'affiliated_company_roles.affiliated_company_id')
                  ->where('affiliated_company_roles.company_id',$company_id)
                  ->where('affiliated_company_roles.rol_id',2)
                  ->select('afiliado_empresas.id','afiliado_empresas.name','afiliado_empresas.last_name','affiliated_company_roles.company_id', 'affiliated_company_roles.rol_id')
                  ->get();
    }

}
