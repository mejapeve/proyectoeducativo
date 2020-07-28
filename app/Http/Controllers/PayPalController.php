<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

class PayPalController extends Controller
{
    //
    public function __construct()
    {
        $paypal_conf = Config::get('paypal');

        $this->_api_context = new ApiContext(new OAuthTokenCredential(
                $paypal_conf['client_id'],
                $paypal_conf['secret'])
        );

    }

    public function payWithPayPal(Request $request)
    {
try{
    $payer = new Payer();

    $payer->setPaymentMethod('credit_card');

    $item_1 = new Item();

    $item_1->setName('secuencia 1') /** item name **/
    ->setCurrency('USD')
        ->setQuantity(1)
        ->setPrice(10); /** unit price **/

    $item_list = new ItemList();
    $item_list->setItems(array($item_1));

    $amount = new Amount();
    $amount->setCurrency('USD')
        ->setTotal(10);

    $transaction = new Transaction();
    $transaction->setAmount($amount)
        ->setItemList($item_list)
        ->setDescription('Your transaction description');

    $redirect_urls = new RedirectUrls();
    $redirect_urls->setReturnUrl(URL::route('approved')) /** Specify return URL **/
    ->setCancelUrl(URL::route('cancel'));


    $payment = new Payment();
    $payment->setIntent('Sale')
        ->setPayer($payer)
        ->setRedirectUrls($redirect_urls)
        ->setTransactions(array($transaction));
    //dd($payment->create($this->_api_context));exit;
    try {
        $payment->create($this->_api_context);
    } catch (\PayPal\Exception\PayPalConnectionException $ex) {
        /*if (\Config::get('app.debug')) {
            \Session::put('error', 'Connection timeout');
            return Redirect::route('paywithpaypal');
        } else {
            \Session::put('error', 'Some error occur, sorry for inconvenient');
            return Redirect::route('paywithpaypal');
        }*/
        dd($ex);
    }
    /*
    foreach ($payment->getLinks() as $link) {
        if ($link->getRel() == 'approval_url') {
            $redirect_url = $link->getHref();
            break;
        }
    }

    /** add payment ID to session **/
    /*
    Session::put('paypal_payment_id', $payment->getId());
    if (isset($redirect_url)) {
        /** redirect to paypal **/
        return Redirect::away($redirect_url);
        /*
    }
    \Session::put('error', 'Unknown error occurred');

    return Redirect::route('paywithpaypal');
    */

}catch (\PayPal\Exception\PayPalConnectionException $ex){
    echo $ex->getCode(); // Prints the Error Code
     echo $ex->getData();
    die($ex);
}
    }
    public function approved(){
        return 1;
    }
    public function cancel(){
return 0;
    }
}
