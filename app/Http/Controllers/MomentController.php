<?php

namespace App\Http\Controllers;

use App\Models\SequenceMoment;
use Illuminate\Http\Request;

class MomentController extends Controller
{
    //

    public function update(Request $request){

        $data = $request->all();

        $moment = SequenceMoment::findOrFail($request->get('id'));

        if (isset($data['order'])){
            if( $data['order'] > 0 && $data['order'] < 9 ){
                $momentChangeOrder = SequenceMoment::where([
                    ['sequence_company_id',$moment->sequence_company_id],
                    ['order',$data['order']]
                ])->get();
                if(count($momentChangeOrder)){
                    $momentChangeOrder = $momentChangeOrder->first();
                    $momentChangeOrder->order = $moment->order;
                    $momentChangeOrder->save();
                    $moment->order = $data['order'];
                }else{
                    $moment->order = $data['order'];
                }

            }else{
                return response()->json([
                    'sequence_id' =>   $moment->id,
                    'messagge' => 'el numero de orden no esta en el rango de 1 a 8'
                ],400);
            }
        }

        if (isset($data['name']))
            $moment->name = $data['name'];
        if (isset($data['description']))
            $moment->description = $data['description'];
        $moment->save();

        return response()->json([
            'moment_id' =>   $moment->id,
            'messagge' => 'momento modificado correctamente'
        ],200);


    }

    public function update_moment_section (Request $request){

        $data = $request->all();

        $moment = SequenceMoment::findOrFail($request->get('id'));
        $test = @json_decode($data['data_section']);
        if ($test) {
            switch (intval(($data['section_number']))){
                case 1:
                    $moment->section_1 = $data['data_section'];
                    break;
                case 2:
                    $moment->section_2 = $data['data_section'];
                    break;
                case 3:
                    $moment->section_3 = $data['data_section'];
                    break;
                case 4:
                    $moment->section_4 = $data['data_section'];
                    break;
                default:
                    return response()->json([
                        'messagge' => 'La sección no existe'
                    ],400);
            }
            $moment->save();
        } else{
            return response()->json([
                'messagge' => 'El formato para guardar los datos del momento no es el correcto, no se pudo modificar el momento'
            ],400);
        }

        return response()->json([
            'moment_id' =>   $moment->id,
            'moment_section_number' =>   $data['section_number'],
            'messagge' => 'momento modificado correctamente'
        ],200);



    }

}
