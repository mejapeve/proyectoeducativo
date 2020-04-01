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
        else return view('roles.student.profile');
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
		$sequence->section_2='{"background_image":"images/sequences/sequence1/rutaViaje-01.jpg",
		"button1_mt":100,"button1_ml":10,"button1_w":256,"button1_h":92,
		"button2_mt":213,"button2_ml":1,"button2_w":256,"button2_h":92,
		"button3_mt":318,"button3_ml":10,"button3_w":256,"button3_h":92,
		"button4_mt":423,"button4_ml":125,"button4_w":256,"button4_h":92
		}';
        $section = json_decode($sequence->section_2, true);
		$data = array_merge(['sequence'=>$sequence],$section);
        if($sequence->section_2) {
			$section = json_decode($sequence->section_2, true);
			$data = array_merge(['sequence'=>$sequence],$section);
			return view('roles.student.sequences_section_2',$data);
		}
    }
	
	public function show_moment_section(Request $request,$empresa, $sequence_id, $order_moment_id, $section) {
        $request->user('afiliadoempresa')->authorizeRoles(['student']);
        //$sequence = CompanySequence::with('moments')->where('id',$sequence_id)->get();
		
		$moment = SequenceMoment::
			where('sequence_moments.sequence_company_id', $sequence_id )
			->where('sequence_moments.order',$order_moment_id )
			->get()[0];
		$moment['section_'.$section] = '{"background_image":"images/sequences/sequence1/rutaViaje-01.png","title":"¿Por qué medimos las cosas?"}';
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
