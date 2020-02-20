<?php

namespace App\Traits;

use App\Models\AfiliadoEmpresa;
use Illuminate\Http\Request;

trait CreateUserRelations
{
    //
    public function create_user_relation($idUser,Request $request,$rol){
        //dd('ingresa');
        switch ($rol){

            case 'student':
                $this->create_user($request);
                break;

        }
    }

    public function create_user(Request $request){

        $aflidiadoEmpresa = new AfiliadoEmpresa();
        $aflidiadoEmpresa->name = $request->name;
        $aflidiadoEmpresa->last_name = $request->name;
        $aflidiadoEmpresa->date_birth = $request->name;


    }

    public function name_user_affiliated($data) {

        $name_user = $data['user_name'].$data['user_name'].'C';

        do{
            if( count(AfiliadoEmpresa::where('user_name',$name_user)->get()) ){
                $name_user = $name_user.rand (0,9);
            }else{
                $asignarNombreUsuario = true;
            }
        }while(!$asignarNombreUsuario);


        return $name_user;

    }
}