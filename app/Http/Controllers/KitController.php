<?php

namespace App\Http\Controllers;

use App\Models\Kit;
use Illuminate\Http\Request;

class KitController extends Controller
{
    //
    public function get_kits(Request $request){

        return Kit::all();

    }
    public function create(Request $request){



    }
    public function update(Request $request, $id){



    }

}
