<?php

namespace App\Http\Controllers;

use App\Models\MomentExperience;
use App\Models\SequenceMoment;
use Illuminate\Http\Request;
use App\Models\CompanySequence;

class SequencesController extends Controller {


    public function get (Request $request,$sequence_id) {

        return CompanySequence::with('moments','moments.experiences')->where('id',$sequence_id)->get();

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
            $sequence->objetives = isset($data['objetives'])?$data['objetives']:null;
            $sequence->section_1 = null;
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
}
