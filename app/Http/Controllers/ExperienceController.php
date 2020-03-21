<?php

namespace App\Http\Controllers;

use App\Models\MomentExperience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    //
    public function update(Request $request){

        $data = $request->all();

        $experience = MomentExperience::findOrFail($request->get('id'));

        if (isset($data['tittle']))
            $experience->name = $data['tittle'];
        if (isset($data['description']))
            $experience->description = $data['description'];
        if (isset($data['objetives']))
            $experience->description = $data['description'];
        $experience->save();

        return response()->json([
            'moment_id' =>   $experience->id,
            'messagge' => 'experiencia modificada correctamente'
        ],200);


    }

    public function update_experience_section (Request $request){

        $data = $request->all();

        $moment = MomentExperience::findOrFail($request->get('id'));
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
                'messagge' => 'El formato para guardar los datos de la sección no es el correcto, no se pudo modificar la sección '
            ],400);
        }

        return response()->json([
            'experience_id' =>   $moment->id,
            'experience_section_number' =>   $data['section_number'],
            'messagge' => 'experiencia modificada correctamente'
        ],200);



    }
}
