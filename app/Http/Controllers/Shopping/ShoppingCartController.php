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

class ShoppingCartController extends Controller
{
    use RelationRatingPlan;

    public function index(Request $request)
    {
        return view('shopping.shopping_cart_layout');
    }

    public function get_shopping_cart(Request $request)
    {
        if ($request->user('afiliadoempresa')) {
            $shoppingCarts = ShoppingCart::
                with('rating_plan', 'shopping_cart_product')->
                where([
                ['company_affiliated_id', $request->user('afiliadoempresa')->id],
                ['payment_status_id', 1],
            ])->get();
        } else {
            if (session_id() == "") {
                session_start();
            }
            $shoppingCarts = ShoppingCart::
                with('rating_plan', 'shopping_cart_product')->
                where([
                ['session_id', session_id()],
                ['payment_status_id', 1],
            ])->get();
        }

        $shoppingCarts = $this->relation_rating_plan($shoppingCarts);
        //return $shoppingCarts;
        return response()->json(['data' => $shoppingCarts], 200);
    }

    public function create(Request $request)
    {

        DB::beginTransaction();
        try {

            $data = $request->all();
            if (gettype($data) == 'array') {
                $shoppingCart = [];
                for ($i = 0; $i < count($data); ++$i) {
                    $shoppingPart = $this->add_shoppingCart($request, $data[$i]);
                    array_push($shoppingCart, $shoppingPart);
                }
            } else if (gettype($data) == 'object') {
                $shoppingCart = $this->add_shoppingCart($request, $data);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['data' => $e->getMessage(), 'message' => 'no se ha registrado el producto correctamente, intente de nuevo'], 400);
            //return response()->json(['data'=>'','message'=> 'no se ha registrado el producto correctamente, intente de nuevo'],400);
            //throw $e;
        } catch (\Throwable $e) {
            DB::rollback();
            return response()->json(['data' => $e->getMessage(), 'message' => 'no se ha registrado el producto correctamente, intente de nuevo'], 400);
            //throw $e;
        }

        return response()->json(['data' => $shoppingCart, 'message' => 'se ha registrado el producto correctamente'], 200);
    }

    public function add_shoppingCart($request, $data)
    {

        $payment_status_default = 1;

        if ($request->user('afiliadoempresa')) {
            $shoppingCart = ShoppingCart::where([
                ['company_affiliated_id', $request->user('afiliadoempresa')->id],
                ['type_product_id', intval($data['type_product_id'])],
                ['payment_status_id', $payment_status_default],
            ])->first();
            //$shipping_price = $shoppingCart->shipping_price;

            if (!$shoppingCart) {
                $shoppingCart = new ShoppingCart();
                $shoppingCart->company_affiliated_id = $request->user('afiliadoempresa')->id;
            }
        } else {
            if (session_id() == "") {
                session_start();
            }

            $shoppingCart = ShoppingCart::where([
                ['session_id', session_id()],
                ['type_product_id', intval($data['type_product_id'])],
                ['payment_status_id', $payment_status_default],
            ])->first();

            if (!$shoppingCart) {
                $shoppingCart = new ShoppingCart();
                $shoppingCart->session_id = session_id();
            }
        }
        if ($shoppingCart->type_product_id != 4 && $shoppingCart->type_product_id != 5) {
            $shoppingCart->shopping_cart_product()->delete();
        }

        if (isset($data['rating_plan_id'])) {
            $shoppingCart->rating_plan_id = intval($data['rating_plan_id']);
        }

        $shoppingCart->type_product_id = intval($data['type_product_id']);

        if (isset($data['payment_status_id'])) {
            $shoppingCart->payment_status_id = intval($data['payment_status_id']);
        } else {
            $shoppingCart->payment_status_id = $payment_status_default;
        }

        $shoppingCart->save();

        foreach ($data['products'] as $product) {
            $shoppingCartProduct = new ShoppingCartProduct();
            $shoppingCartProduct->shopping_cart_id = $shoppingCart->id;
            $shoppingCartProduct->product_id = $product['id'];
            $shoppingCartProduct->save();
        }
        return $shoppingCart;
    }

    public function delete(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $ids = explode(',', $data['ids']);
            $update = ShoppingCart::whereIn('id', $ids)
                ->update(array(
                    'payment_status_id' => 5,
                ));
            if (intval($data['payment_status_id']) === 3) {
                $shoppingCarts = ShoppingCart::with('shopping_cart_product')
                    ->whereIn('id', $ids)->where('rating_plan_id', '!=', null)->get();
                foreach ($shoppingCarts as $shoppingCart) {
                    foreach ($shoppingCart->shopping_cart_product as $shopping_cart_product) {
                        $affiliatedAccountService = new AffiliatedAccountService();
                        $affiliatedAccountService->company_affiliated_id = 1; //auth user
                        $affiliatedAccountService->type_product_id = $shoppingCart->type_product_id;
                        switch ($shoppingCart->type_product_id) {
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
            return response()->json(['data' => $e->getMessage(), 'message' => 'no se ha modificado el producto correctamente'], 400); //throw $e;
        } catch (\Throwable $e) {
            DB::rollback();
            return response()->json(['data' => $e->getMessage(), 'message' => 'no se ha modificado el producto correctamente'], 400); //throw $e;
        }

        return response()->json(['data' => $update, 'message' => 'se ha modificado el producto correctamente'], 200);
    }

    public function get_preference_initPoint()
    {

        //MercadoPago\SDK::setClientId("TEST-7b92f740-e376-40ee-8108-a8a0c3fa067a");
        //MercadoPago\SDK::setClientSecret("TEST-7394833091802936-031118-6efb7b3446ef18d20bccb024638e38f3-271000387");
        MercadoPago\SDK::setAccessToken("TEST-7394833091802936-031118-6efb7b3446ef18d20bccb024638e38f3-271000387");

        # Create a preference object
        $preference = new MercadoPago\Preference();
        $preference->auto_return = "approved";
        $preference->back_urls = array(
            "success" => route('notification_gwpayment_callback'),
            "failure" => route('notification_gwpayment_callback')
        );

        $ratingPlans = DB::table('rating_plans')
            ->join('shopping_carts', 'rating_plans.id', '=', 'shopping_carts.rating_plan_id')
            ->where('shopping_carts.company_affiliated_id', auth("afiliadoempresa")->user()->id)
            ->where('shopping_carts.payment_status_id', 1)
            ->select('rating_plans.id', 'rating_plans.name', 'rating_plans.description', 'rating_plans.price')
            ->get();

        foreach ($ratingPlans as $ratingPlan) {
            $item = new MercadoPago\Item();
            $item->id = $ratingPlan->id;
            $item->title = $ratingPlan->name;
            $item->description = $ratingPlan->description;
            $item->quantity = 1;
            $item->unit_price = $ratingPlan->price;
            $item->currency_id = 'COP';
        }

        $preference->items = array($item);

        $preference->payment_methods = array(
            "excluded_payment_types" => array(
                array("id" => "ticket",
                ),
            ),
        );

        $preference->save();

        $update = ShoppingCart::where([["company_affiliated_id", auth("afiliadoempresa")->user()->id],
            ['payment_status_id', 1]])->
            update(array('payment_transaction_id' => $preference->id,
                         'payment_status_id' => 2));

        return response()->json(['preference_id' => $preference->id, 'initPoint' => $preference->init_point, 'message' => 'preferencia creada correctamente'], 200);
    }
}
