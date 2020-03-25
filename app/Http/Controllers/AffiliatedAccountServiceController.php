<?php

namespace App\Http\Controllers;

use App\Models\AffiliatedAccountService;
use Illuminate\Http\Request;
use App\Traits\RelationRatingPlan;
class AffiliatedAccountServiceController extends Controller
{
    //
    use RelationRatingPlan;
    public function get (Request $request,$affiliatedId){

        $affiliatedAccountService = AffiliatedAccountService::
            with('rating_plan')
            ->where('company_affiliated_id',$affiliatedId)->get();
        $affiliatedAccountService = $this->relation_rating_plan($affiliatedAccountService);


        return $affiliatedAccountService;
    }

}
