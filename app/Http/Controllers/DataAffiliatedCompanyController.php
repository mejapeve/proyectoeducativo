<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;

/**
 * Class DataAffiliatedCompanyController
 * @package App\Http\Controllers
 */
class DataAffiliatedCompanyController extends Controller
{
    //

    /**
     * @param $empresa
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($empresa)
    {

        $company = Companies::where('nick_name', $empresa)->first();
        if ($company) {
            if ($company->name == 'conexiones') {
                return view('auth.login.afiliadoEmpresa', ['company' => $company]);
            } else {
                session(['name_company' => $empresa]);
                session(['company_id' => $company->id]);
                return view('auth.login.companyLoginForm', ['company' => $company]);
            }
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index_admin()
    {
        session(['name_company' => 'conexiones']);
        session(['company_id' => 1]);
        $company = Companies::where('nick_name', 'conexiones')->first();
        return view('auth.login.admin', ['company' => $company]);
    }
}
