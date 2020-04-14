<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdvanceLineController extends Controller
{
    //
    public function get (Request $request){
        $advanceLine =   \App\Models\AdvanceLine::whereHas('affiliated_account_service',function($query){
            $query->where([
                ['company_affiliated_id',10],
                ['company_sequence_id',1]
            ]);
        })->orderBy('number_moment', 'ASC')->orderBy('struct_content_id', 'ASC')->get();
        return response()->json(['data'=>$advanceLine],200);
    }
}
