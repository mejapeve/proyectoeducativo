<?php

namespace App\Http\Controllers\Shopping;

use App\Http\Controllers\Controller;

class ShippingFormController extends Controller
{
    public function index()
    {
        return view('shopping.shippingForm');
    }
}
