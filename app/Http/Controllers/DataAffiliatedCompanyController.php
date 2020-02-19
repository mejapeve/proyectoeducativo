<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataAffiliatedCompanyController extends Controller
{
    //

    public function index(){

        return view('auth.login.afiliadoEmpresa');

    }

    public function index_admin(){

        return view('auth.login.admin');

    }
}
