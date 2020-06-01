<?php

namespace App\Http\Controllers;

use App\Models\Element;
use Illuminate\Http\Request;

/**
 * Class ElementController
 * @package App\Http\Controllers
 */
class ElementController extends Controller
{
    //
    /**
     * @param Request $request
     * @return Element[]|\Illuminate\Database\Eloquent\Collection
     */
    public function get_elements(Request $request)
    {

        return Element::all();

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
