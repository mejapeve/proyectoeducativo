<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactusController extends Controller
{
    //

    public function send_email_contactus(Request $request){

        $var = $request->all();
        return response()->json(['data'=>[
            ['info'=>'bien']
        ]

        ],200);
        //dd('ingresa',$request->get('name'),$var['email']);
        //crear notificación
        //enviar notificación
        //retornar respuesta
    }
}
