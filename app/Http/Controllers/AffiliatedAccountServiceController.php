<?php

namespace App\Http\Controllers;

use App\Models\AffiliatedAccountService;
use Illuminate\Http\Request;
use App\Traits\RelationRatingPlan;
use Illuminate\Support\Facades\DB;

class AffiliatedAccountServiceController extends Controller
{
    //
    use RelationRatingPlan;
    public function get (Request $request,$affiliatedId){
        //cache()->tags('connection_sequences')->flush();
        //DB::connection()->enableQueryLog();
        $affiliatedAccountService = AffiliatedAccountService::where('company_affiliated_id',$affiliatedId)->
            with('rating_plan')->get();
        $affiliatedAccountService = $this->relation_rating_plan($affiliatedAccountService);

        //return DB::getQueryLog();//$shopingCarts;
        return $affiliatedAccountService;
    }

}
