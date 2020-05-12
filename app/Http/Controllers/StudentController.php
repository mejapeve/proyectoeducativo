<?php

namespace App\Http\Controllers;

use App\Models\AdvanceLine;
use App\Models\AffiliatedAccountService;
use App\Models\AffiliatedCompanyRole;
use App\Models\AffiliatedContentAccountService;
use App\Models\AfiliadoEmpresa;
use App\Models\AfiliadoEmpresaRoles;
use App\Models\ConectionAffiliatedStudents;
use Carbon\Carbon;
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
            if(isset($request->user('afiliadoempresa')->birthday) && $request->user('afiliadoempresa')->birthday>0 ) {
                $age = Carbon::now()->diffInYears(Carbon::parse($request->user('afiliadoempresa')->birthday));
            }
            return view('roles.student.profile',['student'=>$request->user('afiliadoempresa'), 'age'=>$age]);
        }
    }
    
    public function show_available_sequences(Request $request) {
        $request->user('afiliadoempresa')->authorizeRoles(['student']);
        return view('roles.student.available_sequences');
    }
    
    public function show_sequences_section_1(Request $request,$empresa, $sequence_id,$account_service_id,$part_id=1) {
        $request->user('afiliadoempresa')->authorizeRoles(['student']);
        $this->validation_access_sequence_content($account_service_id);
        $sequence = CompanySequence::where('id',$sequence_id)->get()->first();
		if($sequence->section_1) {
            $section = json_decode($sequence->section_1, true);
            $section = $section['part_' . $part_id];
            $data = array_merge(['sequence'=>$sequence],$section);
            return view('roles.student.sequences_section_1',$data)->with('account_service_id',$account_service_id)->with('sequence_id',$sequence_id);
        }
        else {
            $sequence->section_1 = '{"background_image":"images/sequences/sequence20/situacionGeradora-20.jpg","text1":"Observen a su alrededor. Seguramente encontrarán casas, estructuras y objetos que tienen diferentes formas y funciones. Muchas de estas construcciones alguna vez fueron solo un pensamiento, quizás un sueño que se hizo realidad a partir de la combinación estratégica de partes hechas de diferentes materiales y medidas.<br/><br/>Todos podemos imaginar y crear, así que queremos invitarlos a diseñar y construir una pista para hacer rodar canicas o esferas usando piezas de madera de diferentes formas y tamaños. La idea es que las canicas puedan pasar por diferentes caminos y que estos presenten algunos obstáculos durante el recorrido. ¿Cómo lo harán? Existen múltiples maneras de combinar las piezas, así que lo primero será dejar volar la imaginación, puesto que la creatividad es la clave para hacer la construcción más divertida. Luego deberán pensar ¿Qué tan alta quieren la pista? ¿Qué forma tendrá? ¿Cuánto espacio ocupará? ¿Cómo ensamblar las diferentes partes de acuerdo con su tamaño y peso? ¿Cómo pueden hacer para que las esferas se muevan más rápido?"}';
        }
    }

    public function show_sequences_section_2(Request $request,$empresa, $sequence_id,$account_service_id,$part_id=1) {
        $request->user('afiliadoempresa')->authorizeRoles(['student']);
        $sequence = CompanySequence::with('moments')->where('id',$sequence_id)->first();
        
        $sequence->section_2='{"background_image":"images/sequences/sequence20/rutaViaje-20.jpg",
                "button1_mt":149,"button1_ml":51,"button1_w":240,"button1_h":92,
                "button2_mt":249,"button2_ml":13,"button2_w":240,"button2_h":92,
                "button3_mt":361,"button3_ml":44,"button3_w":256,"button3_h":92,
                "button4_mt":461,"button4_ml":150,"button4_w":256,"button4_h":92,
                "button5_mt":143,"button5_ml":639,"button5_w":256,"button5_h":92,
                "button6_mt":254,"button6_ml":623,"button6_w":256,"button6_h":92,
                "button7_mt":357,"button7_ml":614,"button7_w":256,"button7_h":92,
                "button8_mt":463,"button8_ml":541,"button8_w":256,"button8_h":92}';
        
        if($sequence->section_2) {
            $this->validation_access_sequence_content($account_service_id);
            $section = json_decode($sequence->section_2, true);
            //$section = $section['part_' . $part_id];
            $data = array_merge(['sequence'=>$sequence],$section);
            return view('roles.student.sequences_section_2',$data)->with('account_service_id',$account_service_id)->with('sequence_id',$sequence_id);
        }
        else {
            
        }
    }
    
    public function show_sequences_section_3(Request $request,$empresa, $sequence_id,$account_service_id,$part_id=1) {
        $request->user('afiliadoempresa')->authorizeRoles(['student']);
        
        $sequence = CompanySequence::where('id',$sequence_id)->get()->first();
        
        if($sequence->section_3) {
            $section = json_decode($sequence->section_3, true);
            $data = array_merge(['sequence'=>$sequence],$section);
            $this->validation_access_sequence_content($account_service_id);
            $section = json_decode($sequence->section_3, true);
            $section = $section['part_' . $part_id];
            $data = array_merge(['sequence'=>$sequence],$section);
            return view('roles.student.sequences_section_1',$data)
			->with('account_service_id',$account_service_id)
			->with('sequence_id',$sequence_id);
        }
        else {
            $sequence->section_3='{}';
        }
    }
    
    public function show_sequences_section_4(Request $request,$empresa, $sequence_id,$account_service_id,$part_id=1) {
        $request->user('afiliadoempresa')->authorizeRoles(['student']);
        
        $sequence = CompanySequence::where('id',$sequence_id)->get()->first();
        if($sequence->section_4) {
            $this->validation_access_sequence_content($account_service_id);
            $section = json_decode($sequence->section_4, true);
            $data = array_merge(['sequence'=>$sequence],$section);
            $section = json_decode($sequence->section_4, true);
            $section = $section['part_' . $part_id];
            $data = array_merge(['sequence'=>$sequence],$section);
            return view('roles.student.sequences_section_1',$data)->with('account_service_id',$account_service_id)->with('sequence_id',$sequence_id);
        }
    }
    
    public function show_moment_section(Request $request,$empresa, $sequence_id, $moment_id, $section_id=1,$account_service_id,$order_moment_id) {
        $request->user('afiliadoempresa')->authorizeRoles(['student']);
        $this->validation_access_sequence_content($account_service_id,true,$sequence_id,$moment_id);
        $moment = SequenceMoment::
            where('sequence_moments.sequence_company_id', $sequence_id )
            ->where('sequence_moments.id',$moment_id )
            ->first();

        $item = AdvanceLine::firstOrNew(
            array(
                'affiliated_account_service_id' => $account_service_id,
                'affiliated_company_id' => auth('afiliadoempresa')->user()->id,
                'sequence_id' => $sequence_id,
                'moment_id' => $order_moment_id,
                'moment_section_id' => $section_id
            )
        );
        $item->save();
        if($moment['section_'.$section_id]) {
            $section = json_decode($moment['section_'.$section_id], true);
            $section_1 = json_decode($moment->section_1, true);
            $section_2 = json_decode($moment->section_2, true);
            $section_3 = json_decode($moment->section_3, true);
            $section_4 = json_decode($moment->section_4, true);
            $data = array_merge(['sequence_id'=>$sequence_id,'moment'=>$moment,'sections'=>[$section_1,$section_2,$section_3,$section_4]],$section);
//            dd($data);
            return view('roles.student.moment_section',$data)->with('account_service_id',$account_service_id)->with('order_moment_id',$order_moment_id);
        }
    }
    
    public function get_available_sequences (Request $request,$empresa,$company_id){
        
        $request->user('afiliadoempresa')->authorizeRoles(['student']);
        $tutor_id = ConectionAffiliatedStudents::select('id','tutor_company_id')
            ->whereHas('student_family',function($query)use($request,$company_id){
            $query->where([
                ['affiliated_company_id',$request->user('afiliadoempresa')->id],
                ['company_id',$company_id],
                ['rol_id',1]
            ]);
        })->first();
        $ids = AffiliatedAccountService::
        with('rating_plan')->whereHas('company_affilated',function($query)use($tutor_id){
            $query->where('id',$tutor_id->tutor_company_id);
        })->where([
            ['init_date','<=',Carbon::now()],
            ['end_date','>=',Carbon::now()]
        ])->pluck('id');

       return AffiliatedContentAccountService::with('sequence')->whereIn('affiliated_account_service_id',$ids)->groupBy('sequence_id')->get();

    }

    public function validation_access_sequence_content($account_service_id,$validation_moments = false,$sequence_id = null,$moment_id = null){
        $affiliatedAccountService = AffiliatedAccountService::with('affiliated_content_account_service')->
            where('init_date','<=',Carbon::now())
                ->where('end_date','>=',Carbon::now())->find($account_service_id);

        $AfiliadoEmpresaRolesId = AfiliadoEmpresaRoles::select('id')->where([
            ['affiliated_company_id',auth('afiliadoempresa')->user()->id],
            ['company_id',1],//conexiones
            ['rol_id',1]//estudiante
        ])->first();
        if($affiliatedAccountService->exists() && $AfiliadoEmpresaRolesId->exists()){
            if($affiliatedAccountService->rating_plan_type == 1 ||$affiliatedAccountService->rating_plan_type == 2){//tiene acceso a plan por secuencia o por momentos
                $afiliadoEmpresa = AfiliadoEmpresa::whereHas('affiliated_company',function($query)use($AfiliadoEmpresaRolesId){
                    $query->whereHas('conection_tutor',function($query)use($AfiliadoEmpresaRolesId){
                        $query->where('student_company_id',$AfiliadoEmpresaRolesId->id);
                    })->where('rol_id',3);
                })->find($affiliatedAccountService->company_affiliated_id);
                if(!$afiliadoEmpresa->exists())
                    dd('no tiene permiso para ingresar, no esta vinculado para ver este contenido');
                if($validation_moments){
                    if(isset($affiliatedAccountService->affiliated_content_account_service)){
                        if(count($affiliatedAccountService->affiliated_content_account_service->where(
                            'sequence_id',$sequence_id
                        )->where('moment_id',$moment_id))==0){
                            dd('no tiene permiso para acceder a este momento',$sequence_id,$moment_id);
                        }
                    }else{
                        dd('algo salio mal asignando los contenidos del plan, comunicarse con conexiones');
                    }
                }
            }else{
                dd('No tiene permiso para ingresar, no es plan por secuencias ni por momentos');
            }
        }else{
            dd('no tiene permiso para ingresar');
        }

    }

}
