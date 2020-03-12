<?php

namespace App\Http\Controllers;

use App\Models\Element;
use Illuminate\Http\Request;

class ElementController extends Controller
{
    //
    public function get_elements (Request $request){

        return Element::all();

    }

    public function create(Request $request){



    }
    public function update(Request $request, $id){



    }
}
