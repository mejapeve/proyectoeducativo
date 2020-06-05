<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdvanceLine;

/**
 * Class AdvanceLineController
 * @package App\Http\Controllers
 */
class AdvanceLineController extends Controller
{
    //
    /**
     * @param Request $request
     * @param $accountServiceId
     * @param $sequenceId
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(Request $request, $accountServiceId, $sequenceId)
    {
        $advanceLine = AdvanceLine::where([
            ['affiliated_company_id', auth('afiliadoempresa')->user()->id],
            ['affiliated_account_service_id', $accountServiceId],
            ['sequence_id', $sequenceId]
        ])->orderBy('moment_order', 'ASC')->orderBy('moment_section_id', 'ASC')->get();
        return response()->json(['data' => $advanceLine], 200);
    }
}
