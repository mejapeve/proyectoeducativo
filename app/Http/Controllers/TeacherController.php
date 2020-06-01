<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class TeacherController
 * @package App\Http\Controllers
 */
class TeacherController extends Controller
{
    //
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $request->user('afiliadoempresa')->authorizeRoles(['teacher']);
        return view('roles.teacher.index');

    }
}