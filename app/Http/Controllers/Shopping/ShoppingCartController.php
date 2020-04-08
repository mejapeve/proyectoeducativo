<?php

namespace App\Http\Controllers\Shopping;

use App\Http\Controllers\Controller;
use App\Models\AffiliatedAccountService;
use App\Models\CompanySequence;
use App\Models\MomentExperience;
use App\Models\SequenceMoment;
use App\Models\ShoppingCart;
use App\Models\ShoppingCartProduct;
use App\Traits\RelationRatingPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        DB::beginTransaction();
        try {
            $data = $request->all();
            if ( isset($data['rating_plan_id']) === true  && $data['rating_plan_id'] !== null){
                $shoppingCart = $this->create_shopping($data);
            }else{
                switch (intval($data['type_product_id'])){
                    case 4://kit
                        $shoppingCart = ShoppingCart::where([
                            ['company_affiliated_id',1],
                            ['type_product_id',4],
                            ['payment_status_id',1]
                        ])->first();
                        $shipping_price = $shoppingCart->shipping_price;
                        //;
                        if($shoppingCart){
                            foreach (json_decode($data['products']) as $product){
                                $shopingCartProduct = new ShoppingCartProduct();
                                $shopingCartProduct->shopping_cart_id = $shoppingCart->id;
                                $shopingCartProduct->product_id = $product->id;
                                $shopingCartProduct->save();
                                $shipping_price += intval($product->shipping_price);
                            }
                            $shoppingCart->shipping_price = $shipping_price;
                            $shoppingCart->save();
                        }else{
                            $shoppingCart = $this->create_shopping($data);
                        }
                        break;
                    case 5://element
                        $shoppingCart = ShoppingCart::where([
                            ['company_affiliated_id',1],
                            ['type_product_id',5],
                            ['payment_status_id',1]
                        ])->first();
                        $shipping_price = $shoppingCart->shipping_price;
                        if($shoppingCart){
                            foreach (json_decode($data['products']) as $product){
                                $shopingCartProduct = new ShoppingCartProduct();
                                $shopingCartProduct->shopping_cart_id = $shoppingCart->id;
                                $shopingCartProduct->product_id = $product->id;
                                $shopingCartProduct->save();
                                $shipping_price += intval($product->shipping_price);
                            }
                            $shoppingCart->shipping_price = $shipping_price;
                            $shoppingCart->save();
                        }else{
                            $shoppingCart = $this->create_shopping($data);
                        }
                        break;
                }
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['data'=>$e->getMessage(),'messagge'=> 'no se ha registrado el producto correctamente, intente de nuevo'],400);
            //return response()->json(['data'=>'','messagge'=> 'no se ha registrado el producto correctamente, intente de nuevo'],400);
            //throw $e;
        } catch (\Throwable $e) {
            DB::rollback();
            return response()->json(['data'=>$e->getMessage(),'messagge'=> 'no se ha registrado el producto correctamente, intente de nuevo'],400);
            //throw $e;
        }

        return response()->json(['data'=>$shoppingCart,'messagge'=> 'se ha registrado el producto correctamente'],200);
    }

    public function create_shopping($data){

        $shoppingCart = new ShoppingCart();
        $shoppingCart->company_affiliadted_id = $data['company_affiliadted_id'];
        $shoppingCart->session_id = $data['session_id'];
        if(isset($data['rating_plan_id']))
            $shoppingCart->payment_status = intval($data['rating_plan_id']);
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
        return $shoppingCart;
    }

    public function update (Request $request){
        DB::beginTransaction();
        try {
            $data = $request->all();
            $ids = explode(',',$data['ids']);
            $update = ShoppingCart::whereIn('id',$ids)
                ->update(array(
                    'payment_status_id' => $data['payment_status_id'],
                    'payment_transaction_id' => $data['payment_transaction_id']
                ));
            if( intval($data['payment_status_id']) === 3 ){
                $shoppingCarts = ShoppingCart::with('shopping_cart_product')
                    ->whereIn('id',$ids)->where('rating_plan_id','!=',null)->get();
                foreach ( $shoppingCarts as $shoppingCart ){
                    foreach ( $shoppingCart->shopping_cart_product as $shopping_cart_product ){
                        $affiliatedAccountService = new AffiliatedAccountService();
                        $affiliatedAccountService->company_affiliated_id = 1; //auth user
                        $affiliatedAccountService->type_product_id = $shoppingCart->type_product_id;
                        switch ($shoppingCart->type_product_id){
                            case 1:
                                $affiliatedAccountService->company_sequence_id = $shopping_cart_product->product_id;
                                break;
                            case 2:
                                $affiliatedAccountService->sequence_moment_id = $shopping_cart_product->product_id;
                                break;
                            case 3:
                                $affiliatedAccountService->company_sequence_id = $shopping_cart_product->product_id;
                                break;
                        }
                        $affiliatedAccountService->init_date = null;
                        $affiliatedAccountService->end_date = null;
                        $affiliatedAccountService->save();
                    }
                }
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['data'=>$e->getMessage(),'messagge'=> 'no se ha modificado el producto correctamente'],400);//throw $e;
        } catch (\Throwable $e) {
            DB::rollback();
            return response()->json(['data'=>$e->getMessage(),'messagge'=> 'no se ha modificado el producto correctamente'],400);//throw $e;
        }

        return response()->json(['data'=>$update,'messagge'=> 'se ha modificado el producto correctamente'],200);

    }
}
