<?php

namespace App\Http\Controllers;

use App\Models\AffiliatedAccountService;
use App\Models\AfiliadoEmpresa;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function index(Request $request){

        $request->user('afiliadoempresa')->authorizeRoles(['admin']);

        return view('roles.admin.index');
    }

    public function get_users_contracted_products (Request $request){

        $companyAffiliateds = AfiliadoEmpresa::whereHas('affiliated_account_services',function ($query){
            $query->where([
                ['init_date','<=',Carbon::now()],
                ['end_date','>=',Carbon::now()]
            ]);
        })->get();

        return response()->json(['data'=>$companyAffiliateds],200);

    }

    public function get_user_contracted_products (Request $request,$affiliatedId){

        $companyAffiliated = AffiliatedAccountService::with('affiliated_content_account_service')->where([
            ['company_affiliated_id',$affiliatedId],
            ['init_date','<=',Carbon::now()],
            ['end_date','>=',Carbon::now()]
        ])->get();

        return response()->json(['data'=>$companyAffiliated],200);

    }
}
