<?php

use Illuminate\Database\Seeder;
use App\Models\ShopingCart;

class ShopingCarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $shopingCarts =
            [
                [
                    "company_affiliated_id"=>1,
                    "session_id"=>null,
                    "rating_plan_id" => 1,
                    "kit_id" => 1,
                    "payment_status" => 1,
                    "payment_transaction_id" => 1,
                    "payment_init_date" => 1,
                ],
                [
                    "company_affiliated_id"=>1,
                    "session_id"=>null,
                    "rating_plan_id" => 2,
                    "kit_id" => 2,
                    "payment_status" => 1,
                    "payment_transaction_id" => 1,
                    "payment_init_date" => 1,
                ],
                [
                    "company_affiliated_id"=>1,
                    "session_id"=>null,
                    "rating_plan_id" => 3,
                    "kit_id" => 3,
                    "payment_status" => 1,
                    "payment_transaction_id" => 1,
                    "payment_init_date" => 1,
                ],
            ];
        foreach ($shopingCarts as $shopingCart){
            $shopingCartN = new ShopingCart();
            $shopingCartN->company_affiliated_id = $shopingCart['company_affiliated_id'];
            $shopingCartN->session_id = $shopingCart['session_id'];
            $shopingCartN->rating_plan_id = $shopingCart['rating_plan_id'];
            $shopingCartN->kit_id = $shopingCart['kit_id'];
            $shopingCartN->payment_status = $shopingCart['payment_status'];
            $shopingCartN->payment_transaction_id = $shopingCart['payment_transaction_id'];
            $shopingCartN->payment_init_date = $shopingCart['payment_init_date'];
            $shopingCartN->save();
        }
    }
}
