<?php

namespace App\Http\Controllers;

use App\Models\CompanySequence;
use App\Models\MomentExperience;
use App\Models\RatingPlan;
use App\Models\SequenceMoment;
use App\Models\AffiliatedAccountService;
use App\Models\TypesRatingPlan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

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
        $ratingPlan->type_rating_plan_id = $data['type_rating_plan_id'];
        $ratingPlan->count = $data['quantity'];
        $ratingPlan->days = $data['days'];
        $ratingPlan->price = $data['cost'];
        $itmes = @json_decode($data['itmes']);
        $itemConcat = '';
        foreach ($itmes as $item){
            $itemConcat = $itemConcat.$item->description.'|';
        }
        $ratingPlan->description_items = $itemConcat;
        if($data['is_free']){
            $ratingPlan->is_free =   $data['is_free'];
            $ratingPlan->sequence_free_id =   $data['sequenceSelected'];
            $ratingPlan->moment_free_ids =   $data['momentSelected'];
        }
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

    public function get_plans_dt (){

        $ratingPlans = RatingPlan::with('type_plan')->get();

        return DataTables::of($ratingPlans)

            ->addColumn('name', function ($ratingPlan) {
                return $ratingPlan->name;
            })
            ->addColumn('description', function ($ratingPlan) {
                return $ratingPlan->description;
            })
            ->addColumn('type_rating_plan', function ($ratingPlan) {
                return $ratingPlan->type_plan->name;
            })
            ->addColumn('quantity_contents', function ($ratingPlan) {
                return $ratingPlan->count;
            })
            ->addColumn('quantity_days', function ($ratingPlan) {
                return $ratingPlan->days;
            })
            ->addColumn('price', function ($ratingPlan) {
                return $ratingPlan->price;
            })
            ->addColumn('edit', function ($ratingPlan) {
                return '<button class="btn btn-warning btn-sm mr-1 mb-1 editPlan" type="button" style="padding: 0.1875rem 1.75rem;font-size: 0.67rem;">Editar</button>';
            })
            ->rawColumns(['edit'])
            ->make(true);
    }

    public function get_types_plans(){

        $typesRatingPlans = TypesRatingPlan::all();
        return response()->json(['data'=>$typesRatingPlans],200);

    }

}
