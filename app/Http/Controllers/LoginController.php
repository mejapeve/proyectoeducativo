<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //

    public function index($nombre)
    {
        return view('prueba')->with('nombre', $nombre);
    }
}

;
