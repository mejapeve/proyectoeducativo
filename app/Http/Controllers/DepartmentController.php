<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

/**
 * Class DepartmentController
 * @package App\Http\Controllers
 */
class DepartmentController extends Controller
{
    //

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function get_departments()
    {

        return response()->json(
            ['data' => Department::all()],
            200
        );

    }

}
