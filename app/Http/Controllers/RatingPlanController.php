<?php

namespace App\Http\Controllers;

use App\Models\CompanySequence;
use App\Models\MomentExperience;
use App\Models\RatingPlan;
use App\Models\SequenceMoment;
use App\Models\AffiliatedAccountService;
use Illuminate\Http\Request;

class RatingPlanController extends Controller
{

    public function get_rating_plans(Request $request){

        $ratingPlan = RatingPlan::with('type_plan')->get();

        return response()->json(['data'=>$ratingPlan],200);
    }
    
    public function get_rating_plan_detail(Request $request, $rating_plan_id){
        $ratingPlan = RatingPlan::where('id', $rating_plan_id)->get();
        return response()->json(['data'=>$ratingPlan],200);
    }

    public function create(Request $request){

        $data = $request->all();
        $ratingPlan = new RatingPlan();
        $ratingPlan->name = $data['name'];
        $ratingPlan->description = $data['description'];
        $ratingPlan->image_url = $data['image_url'];
        $ratingPlan->price = $data['price'];
        $ratingPlan->is_free = $data['is_free'];
        $ratingPlan->type_rating_plan_id = $data['type_rating_plan_id'];
        $ratingPlan->count = $data['count'];
        $ratingPlan->days = $data['days'];
        $ratingPlan->save();
        return response()->json(['data'=>$ratingPlan],200);

    }

    public function update(Request $request){

        $data = $request->all();

        $ratingPlan = RatingPlan::findOrFail($data['id']);
        $ratingPlan->name = $data['name'];
        $ratingPlan->description = $data['description'];
        $ratingPlan->image_url = $data['image_url'];
        $ratingPlan->price = $data['price'];
        $ratingPlan->is_free = $data['is_free'];
        $ratingPlan->type_rating_plan_id = $data['type_rating_plan_id'];
        $ratingPlan->count = $data['count'];
        $ratingPlan->days = $data['days'];
        $ratingPlan->save();
        return response()->json(['data'=>$ratingPlan],200);

    }

    public function validate_free_plan(Request $request,$rating_plan_id){
        
        $ratingPlan = RatingPlan::find($rating_plan_id);
        
        if(!$ratingPlan || !$ratingPlan->is_free) {
            return view('page404',['message'=>'Plan gratuito no encontrado']);
        }
        
        $user = $request->user('afiliadoempresa');
        if($user) {
            //TODO:  si el afliiado es diferente a familiar (tutor), invitar a registro
            if($user->hasRole('tutor')) {
                $accountService = new AffiliatedAccountService();
                $accountService->company_affiliated_id = $user->id;
                $accountService->rating_plan_id = $rating_plan_id;
                $accountService->init_date = date('Y-m-d');
                $accountService->end_date = date('Y-m-d', strtotime('+ '.$ratingPlan->days.' day'));
                $accountService->rating_plan_type = $ratingPlan->type_rating_plan_id;
                $accountService->sequence_ids = $ratingPlan->sequence_free_id;
                $accountService->moment_ids = $ratingPlan->moment_free_ids;
                $accountService->save();
                
                return redirect('conexiones/tutor');
            }
        }
        else {
            
            $request->session()->put('free_rating_plan_ids',$rating_plan_id);
            
            return redirect()->action('Auth\RegisterController@show_register');
        }
    }

}
