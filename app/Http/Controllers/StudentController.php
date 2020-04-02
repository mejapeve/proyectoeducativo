<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\CompanySequence;
use App\Models\SequenceMoment;

class StudentController extends Controller
{
    public function index (Request $request){
        $request->user('afiliadoempresa')->authorizeRoles(['student']);
        if($request->user('afiliadoempresa')->url_image == null) {
            return view('roles.student.avatar');
        }
        else {
			$age = '';
			if($request->user('afiliadoempresa')->date_birth) {
			  $birthDate = explode("/", $request->user('afiliadoempresa')->date_birth);
			  //get age from date or birthdate
			  $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
				? ((date("Y") - $birthDate[2]) - 1)
				: (date("Y") - $birthDate[2]));
			}
			return view('roles.student.profile',['student'=>$request->user('afiliadoempresa'), 'age'=>$age]);
		}
    }
    
    public function show_available_sequences(Request $request) {
        $request->user('afiliadoempresa')->authorizeRoles(['student']);
        return view('roles.student.available_sequences');
    }
    
    public function show_sequences_section_1(Request $request,$empresa, $sequence_id) {
        $request->user('afiliadoempresa')->authorizeRoles(['student']);
        //$sequence = CompanySequence::with('moments','moments.experiences')->where('id',$sequence_id)->get();
		$sequence = CompanySequence::where('id',$sequence_id)->get();
        $sequence = $sequence[0];
		$sequence->section_1 = '{"background_image":"images/sequences/sequence20/situacionGeradora-20.jpg","text1":"Observen a su alrededor. Seguramente encontrarán casas, estructuras y objetos que tienen diferentes formas y funciones. Muchas de estas construcciones alguna vez fueron solo un pensamiento, quizás un sueño que se hizo realidad a partir de la combinación estratégica de partes hechas de diferentes materiales y medidas.<br/><br/>Todos podemos imaginar y crear, así que queremos invitarlos a diseñar y construir una pista para hacer rodar canicas o esferas usando piezas de madera de diferentes formas y tamaños. La idea es que las canicas puedan pasar por diferentes caminos y que estos presenten algunos obstáculos durante el recorrido. ¿Cómo lo harán? Existen múltiples maneras de combinar las piezas, así que lo primero será dejar volar la imaginación, puesto que la creatividad es la clave para hacer la construcción más divertida. Luego deberán pensar ¿Qué tan alta quieren la pista? ¿Qué forma tendrá? ¿Cuánto espacio ocupará? ¿Cómo ensamblar las diferentes partes de acuerdo con su tamaño y peso? ¿Cómo pueden hacer para que las esferas se muevan más rápido?"}';
		if($sequence->section_1) {
			$section = json_decode($sequence->section_1, true);
			$data = array_merge(['sequence'=>$sequence],$section);
			return view('roles.student.sequences_section_1',$data);
		}
    }

    public function show_sequences_section_2(Request $request,$empresa, $sequence_id) {
        $request->user('afiliadoempresa')->authorizeRoles(['student']);
        //$sequence = CompanySequence::with('moments','moments.experiences')->where('id',$sequence_id)->get();
		$sequence = CompanySequence::where('id',$sequence_id)->get();
        $sequence = $sequence[0];
		$sequence->section_2='{"background_image":"images/sequences/sequence20/rutaViaje-20.jpg",
		"button1_mt":149,"button1_ml":51,"button1_w":240,"button1_h":92,
		"button2_mt":249,"button2_ml":13,"button2_w":240,"button2_h":92,
		"button3_mt":361,"button3_ml":44,"button3_w":256,"button3_h":92,
		"button4_mt":461,"button4_ml":150,"button4_w":256,"button4_h":92,
		"button5_mt":143,"button5_ml":639,"button5_w":256,"button5_h":92,
		"button6_mt":254,"button6_ml":623,"button6_w":256,"button6_h":92,
		"button7_mt":357,"button7_ml":614,"button7_w":256,"button7_h":92,
		"button8_mt":463,"button8_ml":541,"button8_w":256,"button8_h":92
		}';
        $section = json_decode($sequence->section_2, true);
		$data = array_merge(['sequence'=>$sequence],$section);
        if($sequence->section_2) {
			$section = json_decode($sequence->section_2, true);
			$data = array_merge(['sequence'=>$sequence],$section);
			return view('roles.student.sequences_section_2',$data);
		}
    }
	
	public function show_sequences_section_3(Request $request,$empresa, $sequence_id) {
        $request->user('afiliadoempresa')->authorizeRoles(['student']);
        
		$sequence = CompanySequence::where('id',$sequence_id)->get();
        $sequence = $sequence[0];
		$sequence->section_3='{
		
		"imagen1_mt":0,"imagen1_ml":0,"imagen1_w":"auto","imagen1_h":465,
		"imagen1_url":"images/sequences/sequence20/bgSaberes-01.png",
		"imagen2_mt":120,"imagen2_ml":231,"imagen2_w":240,"imagen2_h":92,
		"imagen2_url":"images/sequences/sequence20/btn1-01.png",
		"imagen3_mt":149,"imagen3_ml":451,"imagen3_w":250,"imagen3_h":192,
		"imagen3_url":"images/sequences/sequence20/btn2-01.png"
		}';
        $section = json_decode($sequence->section_3, true);
		$data = array_merge(['sequence'=>$sequence],$section);
        if($sequence->section_3) {
			$section = json_decode($sequence->section_3, true);
			$data = array_merge(['sequence'=>$sequence],$section);
			return view('roles.student.sequences_section_3',$data);
		}
    }
	
	public function show_sequences_section_4(Request $request,$empresa, $sequence_id) {
        $request->user('afiliadoempresa')->authorizeRoles(['student']);
        $sequence = CompanySequence::where('id',$sequence_id)->get();
        $sequence = $sequence[0];
		$sequence->section_4='{
		"background_image":"images/sequences/sequence20/puntoEncuentro-20.png"}';
        $section = json_decode($sequence->section_4, true);
		$data = array_merge(['sequence'=>$sequence],$section);
        if($sequence->section_4) {
			$section = json_decode($sequence->section_4, true);
			$data = array_merge(['sequence'=>$sequence],$section);
			return view('roles.student.sequences_section_4',$data);
		}
    }
	
	public function show_moment_section(Request $request,$empresa, $sequence_id, $order_moment_id, $section=1) {
        $request->user('afiliadoempresa')->authorizeRoles(['student']);
        //$sequence = CompanySequence::with('moments')->where('id',$sequence_id)->get();
		
		$moment = SequenceMoment::
			where('sequence_moments.sequence_company_id', $sequence_id )
			->where('sequence_moments.order',$order_moment_id )
			->get()[0];
		$moment['section_'.$section] = '{"title":"¿Por qué medimos las cosas?",
		"imagen1_mt":90,"imagen1_ml":0,"imagen1_w":"auto","imagen1_h":465,
		"imagen1_url":"images/sequences/sequence20/moments/momento1-parte-01.png",
		"imagen2_mt":0,"imagen2_ml":0,"imagen2_w":240,"imagen2_h":92,
		"imagen2_url":"images/sequences/sequence20/moments/momento1-01.png",
		"button1_label":"","button1_mt":149,"button1_ml":51,"button1_w":240,"button1_h":92
		}';
		
		if($moment['section_'.$section]) {
			$section = json_decode($moment['section_'.$section], true);
			$data = array_merge(['sequence_id'=>$sequence_id,'moment'=>$moment],$section);
			return view('roles.student.moment_section',$data);
		}
    }
    
    public function get_available_sequences (Request $request){
        
        $request->user('afiliadoempresa')->authorizeRoles(['student']);
        
        // retorna la lista de todas secuencias indicando en un flag si el alumno tiene activa alguna o no company_sequences.*, 
        return  DB::select('SELECT company_sequences.*,
                            IF(affiliated_account_services.id IS NULL, \'false\',\'true\' ) AS isAvailable 
                            FROM company_sequences 
                            LEFT JOIN affiliated_account_services  
                            ON company_sequences.id = company_sequences.id
                            AND affiliated_account_services.company_affiliated_id = ?
                            WHERE company_sequences.init_date <= CURRENT_DATE  
                            AND ( company_sequences.expiration_date >= CURRENT_DATE or company_sequences.expiration_date IS NULL )', 
                        [$request->user('afiliadoempresa')->id]);
               
    }
}
