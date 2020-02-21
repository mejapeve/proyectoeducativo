<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    //

    public function get_departments (){

        return response()->json(
            ['data'=>Department::all()],
            200
        );

    }

}
