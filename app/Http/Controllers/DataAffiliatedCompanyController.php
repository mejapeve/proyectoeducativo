<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;

class DataAffiliatedCompanyController extends Controller
{ 
    //

    public function index($empresa){
		
		$company = Companies::where('nick_name', $empresa)->first();
        //session(['name_company' => $empresa]);
		if($company) {
			if($company->name == 'conexiones') {
				return view('auth.login.afiliadoEmpresa',['company' => $company ]);
			}
			else {
				return view('auth.login.companyLoginForm',['company' => $company ]);
			}
		}
    }

    public function index_admin(){
        //session(['name_company' => 'conexiones']);
        return view('auth.login.admin');
    }
}
