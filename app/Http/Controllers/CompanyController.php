<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use App\Models\CompanyGroup;
use Illuminate\Http\Request;

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

        return Companies::with(['compani_sequences.sequences'])->where('id',$company_id)->get();


    }

    public function get_company_groups (Request $request,$company_id){

        return CompanyGroup::where('company_id',$company_id)->get();

    }


}
