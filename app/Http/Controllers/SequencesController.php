<?php

namespace App\Http\Controllers;

use App\Models\MomentExperience;
use App\Models\SequenceMoment;
use Illuminate\Http\Request;
use App\Models\CompanySequence;

class SequencesController extends Controller {


    public function get (Request $request,$sequence_id) {

        return CompanySequence::with('moments','moments.experiences','sequence_kit.kit.kit_elements.element')->where('id',$sequence_id)->get();

    }

    public function create(Request $request){
        $data = $request->all();

        try{
            $sequence =  new CompanySequence();
            $sequence->company_id = 1;
            $sequence->name = isset($data['name'])?$data['name']:null;
            $sequence->description = isset($data['description'])?$data['description']:null;
            $sequence->url_image = isset($data['url_image'])?$data['url_image']:null;
            $sequence->url_slider_images = isset($data['url_slider_images'])?$data['url_slider_images']:null;
            $sequence->keywords = isset($data['keywords'])?$data['keywords']:null;
            $sequence->areas = isset($data['areas'])?$data['areas']:null;
            $sequence->themes = isset($data['themes'])?$data['themes']:null;
            $sequence->objectives = isset($data['objectives'])?$data['objectives']:null;
            $var_sections = ['section_1','section_2','section_3','section_4'];
            for ($i=0; $i < count($var_sections); $i++ ){
                if(isset($data[$var_sections[$i]])){
                    $test = @json_decode($data[$var_sections[$i]]);
                    if ($test) {
                        switch ($i){
                            case 0:
                                $sequence->section_1 = $data[$var_sections[$i]];
                                break;
                            case 1:
                                $sequence->section_2 = $data[$var_sections[$i]];
                                break;
                            case 2:
                                $sequence->section_3 = $data[$var_sections[$i]];
                                break;
                            case 3:
                                $sequence->section_4 = $data[$var_sections[$i]];
                                break;
                            default:
                                return response()->json([
                                    'messagge' => 'Algo salio mal'
                                ],500);
                        }
                    } else {
                        return response()->json([
                            'messagge' => 'El formato para guardar los datos de la seccion(es) no es el correcto, no se pudo crear la secuencia'
                        ],400);
                    }

                }
            }
            $sequence->init_date = isset($data['init_date'])?$data['init_date']:null;
            $sequence->expiration_date = isset($data['expiration_date'])?$data['expiration_date']:null;
            $sequence->save();
            for($i=0; $i < 8; $i++){
                $moment = new SequenceMoment();
                $moment->sequence_company_id = $sequence->id;
                $moment->save();
                $experience = new MomentExperience();
                $experience->sequence_moment_id = $moment->id;
                $experience->save();

            }
            return response()->json([
                'sequence_id' =>   $sequence->id,
                'messagge' => 'secuencia creada correctamente'
            ],200);
        }catch (\Exception $e){

            return response()->json([
                'error' =>   $e->getMessage(),
                'messagge' => 'La secuencia no pudo ser creada, revise que los campos esten correctos'
            ],500);

        }

    }

    public function update (Request $request){

        $data = $request->all();

        $sequence = CompanySequence::findOrFail($request->get('id'));

        if (isset($data['name']))
            $sequence->name = $data['name'];
        if (isset($data['description']))
            $sequence->description = $data['description'];
        if (isset($data['url_image']))
            $sequence->url_image = $data['url_image'];
        if (isset($data['url_slider_images']))
            $sequence->url_slider_images = $data['url_slider_images'];
        if (isset($data['keywords']))
            $sequence->keywords = $data['keywords'];
        if (isset($data['areas']))
            $sequence->areas = $data['areas'];
        if (isset($data['themes']))
            $sequence->themes = $data['themes'];
        if (isset($data['objectives']))
            $sequence->objectives = $data['objectives'];
        if (isset($data['init_date']))
            $sequence->init_date = $data['init_date'];
        if (isset($data['expiration_date']))
            $sequence->expiration_date = $data['expiration_date'];
        $sequence->save();

        return response()->json([
            'sequence_id' =>   $sequence->id,
            'messagge' => 'secuencia modificada correctamente'
        ],200);



    }

    public function update_sequence_section (Request $request){

        $data = $request->all();

        $sequence = CompanySequence::findOrFail($request->get('id'));
        $test = @json_decode($data['data_section']);
        if ($test) {
            switch (intval(($data['section_number']))){
                case 1:
                    $sequence->section_1 = $data['data_section'];
                    break;
                case 2:
                    $sequence->section_2 = $data['data_section'];
                    break;
                case 3:
                    $sequence->section_3 = $data['data_section'];
                    break;
                case 4:
                    $sequence->section_4 = $data['data_section'];
                    break;
                default:
                    return response()->json([
                        'messagge' => 'La sección no existe'
                    ],400);
            }
            $sequence->save();
        } else{
            return response()->json([
                'messagge' => 'El formato para guardar los datos de la sección no es el correcto, no se pudo modificar la sección'
            ],400);
        }

        return response()->json([
            'sequence_id' =>   $sequence->id,
            'sequence_section_number' =>   $data['section_number'],
            'messagge' => 'secuencia modificada correctamente'
        ],200);



    }
}
