<?php

namespace App\Http\Controllers\Shopping;

use App\Http\Controllers\Controller;
use MercadoPago\SDK;
use MercadoPago\Item;
use MercadoPago\Preference;

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

    public function __construct()
    {
        SDK::setClientId(
            config("MERCADOPAGO_KEY")
        );
        SDK::setClientSecret(
            config("MERCADOPAGO_SECRET")
        );
    }

    public function index()
    {
        SDK::setAccessToken('TEST-7394833091802936-031118-6efb7b3446ef18d20bccb024638e38f3-271000387');
        $preference = new Preference();
        // Crea un ítem en la preferencia
        $item = new Item();
        $item->title = 'Secuencia de prueba';
        $item->quantity = 1;
        $item->unit_price = 75.56;
        $preference->items = array($item);
        $preference->save();    
        return view('shopping.checkout')->with([$preference]);
    }

}
