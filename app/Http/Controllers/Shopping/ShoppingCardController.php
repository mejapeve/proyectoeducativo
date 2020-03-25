<?php

namespace App\Http\Controllers\Shopping;

use App\Http\Controllers\Controller;
use App\Models\CompanySequence;
use App\Models\MomentExperience;
use App\Models\SequenceMoment;
use App\Models\ShopingCart;
use Illuminate\Http\Request;

class ShoppingCardController extends Controller
{
    public function index(){
        return view('shopping.card');
    }

    public function get_shoping_car(Request $request,$user_id){

        $shopingCarts = ShopingCart::
            with('kit','kit.kit_elements.element','rating_plan')->
            where('company_affiliated_id',$user_id)->get();

        for ($i=0; $i < count($shopingCarts); $i++){
           if(isset($shopingCarts[$i]->rating_plan)){
               if($shopingCarts[$i]->rating_plan->sequences_included !== null){
                   $sequences = explode(',',$shopingCarts[$i]->rating_plan->sequence_company_ids);
                   $shopingCarts[$i]['rating_plan']['sequences'] = CompanySequence::whereIn('id',$sequences)->get();
               }else{
                   if($shopingCarts[$i]->rating_plan->moments_included !== null){
                       $moments = explode(',',$shopingCarts[$i]->rating_plan->sequence_moments_ids);
                       $shopingCarts[$i]['rating_plan']['moments'] = SequenceMoment::whereIn('id',$moments)->get();
                   }else{
                       if($shopingCarts[$i]->rating_plan->experiences_included !== null){
                           $experiences = explode(',',$shopingCarts[$i]->rating_plan->sequence_experience_ids);
                           $shopingCarts[$i]['rating_plan']['experiences'] = MomentExperience::whereIn('id',$experiences)->get();
                       }

                   }
               }
           }

        }

        return response()->json(['data'=>$shopingCarts],200);
    }

    public function create(Request $request){

        $data = $request->all();
        $shopingCart = new ShopingCart();
        $shopingCart->company_affiliadted_id = $data['company_affiliadted_id'];
        $shopingCart->session_id = $data['session_id'];
        $shopingCart->rating_plan_id = $data['rating_plan_id'];
        if(isset($data['kit_id']))
            $shopingCart->kit_id = $data['kit_id'];
        if(isset($data['payment_status']))
            $shopingCart->payment_status = intval($data['payment_status']);
        if(isset($data['payment_transaction_id']))
            $shopingCart->payment_transaction_id = intval($data['payment_transaction_id']);
        if(isset($data['payment_init_date']))
            $shopingCart->payment_init_date = intval($data['payment_init_date']);
        if(isset($data['shipping_price']))
            $shopingCart->shipping_price = intval($data['shipping_price']);
        if(isset($data['shipping_price']))
            $shopingCart->shipping_price = intval($data['shipping_price']);
        $shopingCart->save();

        return response()->json(['data'=>$shopingCart,'messagge'=> 'se ha registrado el producto correctamente'],200);

    }
}
