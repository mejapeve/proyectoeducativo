<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanySequence;

class SequencesController extends Controller {
    public function get (Request $request,$sequence_name) {
        return CompanySequence::where('name',$sequence_name)->get();
    }
}
