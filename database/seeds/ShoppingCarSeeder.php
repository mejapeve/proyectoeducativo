<?php

use Illuminate\Database\Seeder;
use App\Models\ShoppingCart;
use App\Models\ShoppingCartProduct;

class ShoppingCarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $shoppingCarts =
            [
                ["company_affiliated_id"=>1, "session_id"=>null, "rating_plan_id" => 1, "kit_id" => 1, "payment_status" => 1, "payment_transaction_id" => 1, "payment_init_date" => 1,"sopping_cart_products"=>"1"],
                ["company_affiliated_id"=>1, "session_id"=>null, "rating_plan_id" => 2, "kit_id" => 2, "payment_status" => 1, "payment_transaction_id" => 1, "payment_init_date" => 1,"sopping_cart_products"=>"2"],
                ["company_affiliated_id"=>1, "session_id"=>null, "rating_plan_id" => 3, "kit_id" => 3, "payment_status" => 1, "payment_transaction_id" => 1, "payment_init_date" => 1,"sopping_cart_products"=>"3,4"],
                ["company_affiliated_id"=>1, "session_id"=>null, "rating_plan_id" => 4, "kit_id" => 3, "payment_status" => 1, "payment_transaction_id" => 1, "payment_init_date" => 1,"sopping_cart_products"=>"5,6,7,8"],
                ["company_affiliated_id"=>1, "session_id"=>null, "rating_plan_id" => 5, "kit_id" => 3, "payment_status" => 1, "payment_transaction_id" => 1, "payment_init_date" => 1,"sopping_cart_products"=>"9,10,11,12,13,14"],
                ["company_affiliated_id"=>1, "session_id"=>null, "rating_plan_id" => 6, "kit_id" => 3, "payment_status" => 1, "payment_transaction_id" => 1, "payment_init_date" => 1,"sopping_cart_products"=>"1,2"],
                ["company_affiliated_id"=>1, "session_id"=>null, "rating_plan_id" => 7, "kit_id" => 3, "payment_status" => 1, "payment_transaction_id" => 1, "payment_init_date" => 1,"sopping_cart_products"=>"1,2,3"],
            ];

            for($i=1; $i<4; $i++){
                foreach ($shoppingCarts as $shoppingCart){
                    $shoppingCartN = new ShoppingCart();
                    $shoppingCartN->company_affiliated_id = $i;
                    $shoppingCartN->session_id = $shoppingCart['session_id'];
                    $shoppingCartN->rating_plan_id = $shoppingCart['rating_plan_id'];
                    $shoppingCartN->kit_id = $shoppingCart['kit_id'];
                    $shoppingCartN->payment_status = $shoppingCart['payment_status'];
                    $shoppingCartN->payment_transaction_id = $shoppingCart['payment_transaction_id'];
                    $shoppingCartN->payment_init_date = $shoppingCart['payment_init_date'];
                    $shoppingCartN->save();

                    $shoppingCartProduct = new ShoppingCartProduct();
                    $shoppingCartProduct->shopping_cart_id = $shoppingCartN->id;
                    $shoppingCartProduct->product_ids = $shoppingCart['sopping_cart_products'];
                    $shoppingCartProduct->save();
                }
            }
    }
}
