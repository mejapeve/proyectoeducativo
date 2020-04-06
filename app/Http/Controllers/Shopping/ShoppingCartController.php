<?php

namespace App\Http\Controllers\Shopping;

use App\Http\Controllers\Controller;
use App\Models\CompanySequence;
use App\Models\MomentExperience;
use App\Models\SequenceMoment;
use App\Models\ShoppingCart;
use App\Models\ShoppingCartProduct;
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
            with('rating_plan','shopping_cart_product')->
            where([
                ['company_affiliated_id',$user],
                ['payment_status_id',1]
        ])->get();

        $shopingCarts = $this->relation_rating_plan($shopingCarts);
        //return $shopingCarts;
        return response()->json(['data'=>$shopingCarts],200);
    }

    public function create(Request $request){

        $data = $request->all();
        if ( isset($data['rating_plan_id']) === true  && $data['rating_plan_id'] !== null){
            $shoppingCart = new ShoppingCart();
            $shoppingCart->company_affiliadted_id = $data['company_affiliadted_id'];
            $shoppingCart->session_id = $data['session_id'];
            $shoppingCart->rating_plan_id = $data['rating_plan_id'];
            if(isset($data['payment_status']))
                $shoppingCart->payment_status = intval($data['payment_status']);
            if(isset($data['payment_transaction_id']))
                $shoppingCart->payment_transaction_id = intval($data['payment_transaction_id']);
            if(isset($data['payment_init_date']))
                $shoppingCart->payment_init_date = intval($data['payment_init_date']);
            if(isset($data['shipping_price']))
                $shoppingCart->shipping_price = intval($data['shipping_price']);
            $shoppingCart->save();
            foreach ($data['products'] as $products){
                $shopingCartProduct = new ShoppingCartProduct();
                $shopingCartProduct->shopping_cart_id = $shoppingCart->id;
                $shopingCartProduct->product_id = $products['id'];
            }
        }else{
            switch (intval($data['type_prduct_id'])){
                case 4://kit
                        $shoppingCart = ShoppingCart::where([
                            ['company_affiliadted_id',1],
                            ['type_product_id',4],
                            ['payment_status_id',1]
                        ])->first();
                        if($shoppingCart){
                            foreach ($data['products'] as $products){
                                $shopingCartProduct = new ShoppingCartProduct();
                                $shopingCartProduct->shopping_cart_id = $shoppingCart->id;
                                $shopingCartProduct->product_id = $products['id'];
                            }
                        }else{
                            $shoppingCart = new ShoppingCart();
                            $shoppingCart->company_affiliadted_id = $data['company_affiliadted_id'];
                            $shoppingCart->session_id = $data['session_id'];
                            if(isset($data['payment_status']))
                                $shoppingCart->payment_status = intval($data['payment_status']);
                            if(isset($data['payment_transaction_id']))
                                $shoppingCart->payment_transaction_id = intval($data['payment_transaction_id']);
                            if(isset($data['payment_init_date']))
                                $shoppingCart->payment_init_date = intval($data['payment_init_date']);
                            if(isset($data['shipping_price']))
                                $shoppingCart->shipping_price = intval($data['shipping_price']);
                            $shoppingCart->save();
                            foreach ($data['products'] as $products){
                                $shopingCartProduct = new ShoppingCartProduct();
                                $shopingCartProduct->shopping_cart_id = $shoppingCart->id;
                                $shopingCartProduct->product_id = $products['id'];
                            }
                        }
                    break;
                case 5://element
                    $shoppingCart = ShoppingCart::where([
                        ['company_affiliadted_id',1],
                        ['type_product_id',5],
                        ['payment_status_id',1]
                    ])->first();
                    if($shoppingCart){
                        foreach ($data['products'] as $products){
                            $shopingCartProduct = new ShoppingCartProduct();
                            $shopingCartProduct->shopping_cart_id = $shoppingCart->id;
                            $shopingCartProduct->product_id = $products['id'];
                        }
                    }else{
                        $shoppingCart = new ShoppingCart();
                        $shoppingCart->company_affiliadted_id = $data['company_affiliadted_id'];
                        $shoppingCart->session_id = $data['session_id'];
                        if(isset($data['payment_status']))
                            $shoppingCart->payment_status = intval($data['payment_status']);
                        if(isset($data['payment_transaction_id']))
                            $shoppingCart->payment_transaction_id = intval($data['payment_transaction_id']);
                        if(isset($data['payment_init_date']))
                            $shoppingCart->payment_init_date = intval($data['payment_init_date']);
                        if(isset($data['shipping_price']))
                            $shoppingCart->shipping_price = intval($data['shipping_price']);
                        $shoppingCart->save();
                        foreach ($data['products'] as $products){
                            $shopingCartProduct = new ShoppingCartProduct();
                            $shopingCartProduct->shopping_cart_id = $shoppingCart->id;
                            $shopingCartProduct->product_id = $products['id'];
                        }
                    }
                    break;
            }
        }

        return response()->json(['data'=>$shoppingCart,'messagge'=> 'se ha registrado el producto correctamente'],200);

    }
}
