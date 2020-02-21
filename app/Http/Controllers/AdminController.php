<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function index(Request $request){

        $request->user('afiliadoempresa')->authorizeRoles(['admin']);

        return view('roles.admin.index');
    }

}
