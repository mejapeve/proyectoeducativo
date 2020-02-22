<?php

namespace App\Http\Controllers;

use App\Traits\CreateUserRelations;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    //
    use CreateUserRelations;

    public function index (Request $request){
        $request->user('afiliadoempresa')->authorizeRoles(['tutor']);
        return view('roles.tutor.index');

    }

    public function register_student (Request $request) {


        $request->user('afiliadoempresa')->authorizeRoles(['tutor']);
        $rol = "student";
        $this->create_user_relation(auth('afiliadoempresa')->user()->id,$request,$rol);

        return redirect()->route('conexiones/tutor');


    }

}
