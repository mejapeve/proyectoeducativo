<?php

namespace App\Http\Controllers\Shopping;

use App\Http\Controllers\Controller;
use App\Models\AffiliatedAccountService;
use App\Models\AffiliatedContentAccountService;
use App\Models\SequenceMoment;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use MercadoPago;

class NotifyCallbackController extends Controller
{
    public function notificacion_callback(Request $request)
    {

        //MercadoPago\SDK::setAccessToken("ENV_ACCESS_TOKEN");
        MercadoPago\SDK::setAccessToken('TEST-7394833091802936-031118-6efb7b3446ef18d20bccb024638e38f3-271000387');

        $merchant_order = null;

        if (isset($_GET["topic"])) {
            switch ($_GET["topic"]) {
                case "payment":
                    $payment = MercadoPago\Payment::find_by_id($_GET["id"]);
                    //dd($request, $_GET, $payment);
                    // Get the payment and the corresponding merchant_order reported by the IPN.
                    //$merchant_order = MercadoPago\MerchantOrder::find_by_id($payment->order->id);
                    break;
                case "merchant_order":
                    $merchant_order = MercadoPago\MerchantOrder::find_by_id($_GET["id"]);
                    break;
            }
        }

        $paid_amount = 0;

        if ($payment->status == 'approved') {
            //$paid_amount += $payment['transaction_amount'];
			$update = ShoppingCart::where("id","2")->
			update(array(
                'payment_status_id' => '99999',
            ));
        }

        // If the payment's transaction amount is equal (or bigger) than the merchant_order's amount you can release your items
        if ($merchant_order) {
            if ($paid_amount >= $merchant_order->total_amount) {
                if (count($merchant_order->shipments) > 0) { // The merchant_order has shipments
                    if ($merchant_order->shipments[0]->status == "ready_to_ship") {
                        print_r("Totally paid. Print the label and release your item.");
                    }
                } else { // The merchant_order don't has any shipments
                    print_r("Totally paid. Release your item.");
                }
            } else {
                print_r("Not paid yet. Do not release your item.");
            }
        }

        if (isset($_GET["payment_transaction_id"])) {

            $payment_transaction_id = $_GET["payment_transaction_id"];

            if ($request->user('afiliadoempresa')) {

                $afiliado_empresa = $request->user('afiliadoempresa');

                $shoppingCartUpdated = ShoppingCart::
                    where([
                    ['company_affiliated_id', $afiliado_empresa->id],
                    ['payment_transaction_id', $payment_transaction_id],
                ])->update(['payment_status_id' => 3]);

                if ($shoppingCartUpdated > 0) {

                    $shoppingCarts = ShoppingCart::
                        with('rating_plan', 'shopping_cart_product')->
                        where([
                        ['company_affiliated_id', $request->user('afiliadoempresa')->id],
                        ['payment_transaction_id', $payment_transaction_id],
                        ['payment_status_id', 3],
                    ])->get();

                    foreach ($shoppingCarts as $shoppingCart) {
                        $ratingPlan = $shoppingCart->rating_plan;
                        if ($ratingPlan) {
                            $this->addRatingPlanPaid($shoppingCart, $ratingPlan, $afiliado_empresa);
                        }
                    }
                }
            }
            return redirect()->route('tutor', ['empresa' => 'conexiones']);
        }
    }

    public function addRatingPlanPaid($shoppingCart, $ratingPlan, $afiliado_empresa)
    {
        $affiliatedAccountService = new AffiliatedAccountService();
        $affiliatedAccountService->company_affiliated_id = $afiliado_empresa->id;
        $affiliatedAccountService->rating_plan_id = $ratingPlan->id;
        $affiliatedAccountService->rating_plan_type = $ratingPlan->type_rating_plan_id;
        $affiliatedAccountService->shopping_cart_id = $shoppingCart->id;

        $affiliatedAccountService->end_date = date('Y-m-d', strtotime('+ ' . $ratingPlan->days . ' day'));
        $affiliatedAccountService->rating_plan_type = $ratingPlan->type_rating_plan_id;
        $affiliatedAccountService->init_date = date('Y-m-d');

        $affiliatedAccountService->save();
        if ($ratingPlan->type_rating_plan_id == 1) { //sequence rating plan
            foreach ($shoppingCart->shopping_cart_product as $product) {
                $sequenceMoments = SequenceMoment::where('sequence_company_id', $product->product_id)->get();
                foreach ($sequenceMoments as $sequenceMoment) {
                    $affiliatedContentAccountService = new AffiliatedContentAccountService();
                    $affiliatedContentAccountService->affiliated_account_service_id = $affiliatedAccountService->id;
                    $affiliatedContentAccountService->type_product_id = $ratingPlan->type_rating_plan_id;
                    $affiliatedContentAccountService->sequence_id = $product->product_id;
                    $affiliatedContentAccountService->moment_id = $sequenceMoment->id;
                    $affiliatedContentAccountService->save();
                }

            }
        } else if ($ratingPlan->type_rating_plan_id == 2 || $ratingPlan->type_rating_plan_id == 3) { //moment / experiences rating plan
            foreach ($shoppingCart->shopping_cart_product as $product) {
                $affiliatedContentAccountService = new AffiliatedContentAccountService();
                $affiliatedContentAccountService->affiliated_account_service_id = $affiliatedAccountService->id;
                $affiliatedContentAccountService->type_product_id = $ratingPlan->type_rating_plan_id;
                $moment = SequenceMoment::find($product->product_id);
                $affiliatedContentAccountService->sequence_id = $moment->sequence_company_id;
                $affiliatedContentAccountService->moment_id = $product->product_id;
                $affiliatedContentAccountService->save();
            }
        }
    }
}
