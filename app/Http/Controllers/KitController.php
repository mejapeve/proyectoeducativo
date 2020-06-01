<?php

namespace App\Http\Controllers;

use App\Models\Kit;
use Illuminate\Http\Request;

/**
 * Class KitController
 * @package App\Http\Controllers
 */
class KitController extends Controller
{
    //
    /**
     * @param Request $request
     * @return Kit[]|\Illuminate\Database\Eloquent\Collection
     */
    public function get_kits(Request $request)
    {

        return Kit::all();

    }

    /**
     * @param Request $request
     */
    public function create(Request $request)
    {


    }

    /**
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id)
    {


    }

}
