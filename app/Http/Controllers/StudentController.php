<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    //

    public function index (Request $request){
        $request->user('afiliadoempresa')->authorizeRoles(['student']);
        return view('roles.studentindex');

    }
}
