<?php

namespace App\Http\Controllers\Shopping;

use App\Http\Controllers\Controller;
use App\Models\CompanySequence;
use App\Models\MomentExperience;
use App\Models\SequenceMoment;
use App\Models\ShoppingCart;
use App\Traits\RelationRatingPlan;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    use RelationRatingPlan;

    public function index(){
        return view('shopping.card');
    }

    public function get_shopping_cart(Request $request,$user){

        $shopingCarts = ShoppingCart::
            with('kit','kit.kit_elements.element','rating_plan','shopping_cart_product')->
            //where('company_affiliated_id',$request->user('afiliadoempresa')->id)->get();
            where('company_affiliated_id',$user)->get();

        $shopingCarts = $this->relation_rating_plan($shopingCarts);

        return response()->json(['data'=>$shopingCarts],200);
    }

    public function create(Request $request){

        $data = $request->all();
        $shopingCart = new ShoppingCart();
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
