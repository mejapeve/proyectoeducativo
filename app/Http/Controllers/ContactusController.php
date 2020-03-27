<?php

namespace App\Http\Controllers;

use App\Mail\SendContactus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactusController extends Controller
{
    //

    public function send_email_contactus(Request $request){

        try{
            $var = $request->all();
            Mail::to( 'contacto@educonexiones.com')->send(new SendContactus($var));
            return response()->json([
                    ['messagge'=>'El mensaje ha sido enviado satisfactoriamente, la respuesta se enviará al correo'],
                    ['status'=>'success']

            ],200);
        }catch (\Exception $e){
            return response()->json([
                    ['messagge'=>'No se ha podido notificar su mesaje, intente de nuevo, gracias'.$e],
                    ['status'=>'error']
            ],500);
        }

    }
}
