<?php

namespace App\Http\Controllers;

use App\Models\Kit;
use App\Models\Element;
use Illuminate\Http\Request;

class KitElementController extends Controller
{
    //
    public function get_kit_elements (Request $request) {

        return Kit::with('kit_elements','kit_elements.element')->get();

    }
	
	public function get_kit (Request $request, $kid_id) {

        return Kit::where('id',$kid_id)->get();

    }
	
	public function get_elements (Request $request, $element_id) {

        return Element::where('id',$element_id)->get();

    }

}
