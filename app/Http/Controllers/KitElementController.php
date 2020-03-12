<?php

namespace App\Http\Controllers;

use App\Models\Kit;
use Illuminate\Http\Request;

class KitElementController extends Controller
{
    //
    public function get_kit_elements (Request $request) {

        return Kit::with('kit_elements','kit_elements.element')->get();

    }

}
