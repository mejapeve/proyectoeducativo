<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;

class DataAffiliatedCompanyController extends Controller
{ 
    //

    public function index($empresa,$errorEmailSocial = false){

		$company = Companies::where('nick_name', $empresa)->first();
		if($company) {
			if($company->name == 'conexiones') {
			    if(!$errorEmailSocial)
				    return view('auth.login.afiliadoEmpresa',['company' => $company ]);
                return view('auth.login.afiliadoEmpresa',['company' => $company ]);

			}
			else {
                session(['name_company' => $empresa]);
                session(['company_id' => $company->id]);
                if(!$errorEmailSocial)
				    return view('auth.login.companyLoginForm',['company' => $company ]);
                return view('auth.login.companyLoginForm',['company' => $company ]);

			}
		}
    }

    public function index_admin(){
        session(['name_company' => 'conexiones']);
        $company = Companies::where('nick_name', 'conexiones')->first();
        return view('auth.login.admin',['company' => $company]);
    }
}
