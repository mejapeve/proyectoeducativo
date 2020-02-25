<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;

class DataAffiliatedCompanyController extends Controller
{
    //

    public function index($empresa){
		//if($empresa == 'conexiones')
		$company = Companies::where('nick_name', $empresa)->first();
		if($company) {
			if($company->name == 'conexiones') {
				return view('auth.login.afiliadoEmpresa',['company' => $company ]);
			}
			else {
				return view('auth.login.companyLoginForm',['company' => $company ]);
			}
		}
		else {
			return view('page500',['messageError'=>'Verifique el link de su compañia', 'companies'=>Companies::all()]);
		}

    }

    public function index_admin(){

        return view('auth.login.admin');

    }
}
