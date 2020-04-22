<?php

namespace App\Http\Controllers\Shopping;

use App\Http\Controllers\Controller;
use App\Models\AffiliatedAccountService;
use App\Models\ShoppingCart;
use App\Models\ShoppingCartProduct;
use App\Traits\RelationRatingPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use MercadoPago;

class NotifyCallbackController extends Controller
{
    public function notificacion_callback(Request $request) {

        //MercadoPago\SDK::setAccessToken("ENV_ACCESS_TOKEN");
        MercadoPago\SDK::setAccessToken('TEST-7394833091802936-031118-6efb7b3446ef18d20bccb024638e38f3-271000387');

        $merchant_order = null;

		if(isset($_GET["topic"])){
			switch($_GET["topic"]) {
				case "payment":
					$payment = MercadoPago\Payment::find_by_id($_GET["id"]);
					// Get the payment and the corresponding merchant_order reported by the IPN.
					$merchant_order = MercadoPago\MerchantOrder::find_by_id($payment->order->id);
					break;
				case "merchant_order":
					$merchant_order = MercadoPago\MerchantOrder::find_by_id($_GET["id"]);
					break;
			}
		}

		
        $paid_amount = 0;
		if($merchant_order)
        foreach ($merchant_order->payments as $payment) {
            if ($payment['status'] == 'approved'){
                $paid_amount += $payment['transaction_amount'];
            }
        }

        // If the payment's transaction amount is equal (or bigger) than the merchant_order's amount you can release your items
		if($merchant_order)
        if($paid_amount >= $merchant_order->total_amount){
            if (count($merchant_order->shipments)>0) { // The merchant_order has shipments
                if($merchant_order->shipments[0]->status == "ready_to_ship") {
                    print_r("Totally paid. Print the label and release your item.");
                }
            } else { // The merchant_order don't has any shipments
                print_r("Totally paid. Release your item.");
            }
        } else {
            print_r("Not paid yet. Do not release your item.");
        }
		
		
		if(isset($_GET["payment_transaction_id"])) {
			if($request->user('afiliadoempresa')) {
				ShoppingCart::
					where([
					['company_affiliated_id', $request->user('afiliadoempresa')->id],
					['payment_transaction_id',$_GET["payment_transaction_id"]]
				])->update(['payment_status_id'=>2]);
			}
			
			return redirect()->route('tutor',['empresa'=> 'conexiones']);
		}
        
    }
}
