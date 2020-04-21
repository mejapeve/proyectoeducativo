<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdvanceLine;

class AdvanceLineController extends Controller
{
    //
    public function get (Request $request,$accountServiceId,$sequenceId){
        /*
        $advanceLine = AdvanceLine::whereHas('affiliated_account_service',function($query)use($accountServiceId){
            $query->where([
                ['company_affiliated_id',auth('afiliadoempresa')->user()->id],
                ['affiliated_account_service_id',$accountServiceId]
            ]);
        })->orderBy('moment_id', 'ASC')->orderBy('section_id', 'ASC')->get();*/
        $advanceLine = AdvanceLine::where([
                ['affiliated_company_id',auth('afiliadoempresa')->user()->id],
                ['affiliated_account_service_id',$accountServiceId],
                ['sequence_id',$sequenceId]
            ])->orderBy('moment_id', 'ASC')->orderBy('moment_section_id', 'ASC')->get();
        return response()->json(['data'=>$advanceLine],200);
    }
}
