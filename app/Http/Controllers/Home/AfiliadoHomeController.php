<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Empresas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AfiliadoHomeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:afiliadoempresa');
    }

    public function index()
    {

        return view('home');

    }
}
