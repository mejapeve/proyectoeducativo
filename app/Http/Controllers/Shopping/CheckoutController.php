<?php

namespace App\Http\Controllers\Shopping;

use App\Http\Controllers\Controller;
use MercadoPago;

class CheckoutController extends Controller
{
    /*public function index()
    {

    $currencies = Currency::all();
    $paymentPlatforms = PaymentPlatform::all();

    return view('shopping.checkout')->with([
    'currencies' => $currencies,
    'paymentPlatforms' => $paymentPlatforms,
    ]);
    }*/

    /*public function __construct()
    {
    MercadoPago\SDK::setClientId(
    config("MERCADOPAGO_KEY")
    );
    MercadoPago\SDK::setClientSecret(
    config("MERCADOPAGO_SECRET")
    );
    }*/

    public function index()
    {
        //MercadoPago\SDK::setClientId("TEST-7b92f740-e376-40ee-8108-a8a0c3fa067a");
        //MercadoPago\SDK::setClientSecret("TEST-7394833091802936-031118-6efb7b3446ef18d20bccb024638e38f3-271000387");
        MercadoPago\SDK::setAccessToken('TEST-7394833091802936-031118-6efb7b3446ef18d20bccb024638e38f3-271000387');
        # Create a preference object
        $preference = new MercadoPago\Preference();
        // Crea un ítem en la preferencia
        $item = new MercadoPago\Item();
        //dd(MercadoPago\SDK::config());
        $item->title = 'Yotopo y los astroamigos';
        $item->quantity = 1;
        $item->unit_price = 5000;
        $preference->items = array($item);
        $preference->save();
        //dd($preference);
        return view('shopping.checkout')->with("preference",$preference);
    }

}
