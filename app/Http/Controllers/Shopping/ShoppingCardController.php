<?php

namespace App\Http\Controllers\Shopping;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShoppingCardController extends Controller
{
    public function index(){
        return view('shopping.card');
    }
	
}
