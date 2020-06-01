<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    //
    public function index(Request $request)
    {
        $request->user('afiliadoempresa')->authorizeRoles(['teacher']);
        return view('roles.teacher.index');

    }
}