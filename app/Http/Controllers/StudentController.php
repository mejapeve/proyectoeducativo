<?php

namespace App\Http\Controllers;

use App\Models\AdvanceLine;
use App\Models\AffiliatedAccountService;
use App\Models\AffiliatedCompanyRole;
use App\Models\AffiliatedContentAccountService;
use App\Models\AfiliadoEmpresa;
use App\Models\AfiliadoEmpresaRoles;
use App\Models\ConectionAffiliatedStudents;
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
              $birthday = explode("-", $request->user('afiliadoempresa')->birthday);
              //get age from date or birthday
              $age = (date("md", date("U", mktime(0, 0, 0, $birthday[0], $birthday[1], $birthday[2]))) > date("md")
                ? ((date("Y") - $birthday[2]) - 1)
                : (date("Y") - $birthday[2]));
            }
            return view('roles.student.profile',['student'=>$request->user('afiliadoempresa'), 'age'=>$age]);
        }
    }
    
    public function show_available_sequences(Request $request) {
        $request->user('afiliadoempresa')->authorizeRoles(['student']);
        return view('roles.student.available_sequences');
    }
    
    public function show_sequences_section_1(Request $request,$empresa, $sequence_id,$account_service_id) {
        $request->user('afiliadoempresa')->authorizeRoles(['student']);
        $this->validation_access_sequence_content($account_service_id);
        //$sequence = CompanySequence::with('moments','moments.experiences')->where('id',$sequence_id)->get();
        $sequence = CompanySequence::where('id',$sequence_id)->get();
        $sequence = $sequence[0];
        $sequence->section_1 = '{"background_image":"images/sequences/sequence20/situacionGeradora-20.jpg","text1":"Observen a su alrededor. Seguramente encontrarán casas, estructuras y objetos que tienen diferentes formas y funciones. Muchas de estas construcciones alguna vez fueron solo un pensamiento, quizás un sueño que se hizo realidad a partir de la combinación estratégica de partes hechas de diferentes materiales y medidas.<br/><br/>Todos podemos imaginar y crear, así que queremos invitarlos a diseñar y construir una pista para hacer rodar canicas o esferas usando piezas de madera de diferentes formas y tamaños. La idea es que las canicas puedan pasar por diferentes caminos y que estos presenten algunos obstáculos durante el recorrido. ¿Cómo lo harán? Existen múltiples maneras de combinar las piezas, así que lo primero será dejar volar la imaginación, puesto que la creatividad es la clave para hacer la construcción más divertida. Luego deberán pensar ¿Qué tan alta quieren la pista? ¿Qué forma tendrá? ¿Cuánto espacio ocupará? ¿Cómo ensamblar las diferentes partes de acuerdo con su tamaño y peso? ¿Cómo pueden hacer para que las esferas se muevan más rápido?"}';
        if($sequence->section_1) {
            $section = json_decode($sequence->section_1, true);
            $data = array_merge(['sequence'=>$sequence],$section);
            return view('roles.student.sequences_section_1',$data)->with('account_service_id',$account_service_id)->with('sequence_id',$sequence_id);
        }
    }

    public function show_sequences_section_2(Request $request,$empresa, $sequence_id,$account_service_id) {
        $request->user('afiliadoempresa')->authorizeRoles(['student']);
        $this->validation_access_sequence_content($account_service_id);
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
            return view('roles.student.sequences_section_2',$data)->with('account_service_id',$account_service_id)->with('sequence_id',$sequence_id);
        }
    }
    
    public function show_sequences_section_3(Request $request,$empresa, $sequence_id,$account_service_id) {
        $request->user('afiliadoempresa')->authorizeRoles(['student']);
        $this->validation_access_sequence_content($account_service_id);
        
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
            return view('roles.student.sequences_section_3',$data)->with('account_service_id',$account_service_id)->with('sequence_id',$sequence_id);
        }
    }
    
    public function show_sequences_section_4(Request $request,$empresa, $sequence_id,$account_service_id) {
        $request->user('afiliadoempresa')->authorizeRoles(['student']);
        $this->validation_access_sequence_content($account_service_id);
        $sequence = CompanySequence::where('id',$sequence_id)->get();
        $sequence = $sequence[0];
        $sequence->section_4='{
        "background_image":"images/sequences/sequence20/puntoEncuentro-20.png"}';
        $section = json_decode($sequence->section_4, true);
        $data = array_merge(['sequence'=>$sequence],$section);
        if($sequence->section_4) {
            $section = json_decode($sequence->section_4, true);
            $data = array_merge(['sequence'=>$sequence],$section);
            return view('roles.student.sequences_section_4',$data)->with('account_service_id',$account_service_id)->with('sequence_id',$sequence_id);
        }
    }
    
    public function show_moment_section(Request $request,$empresa, $sequence_id, $order_moment_id, $section_id=1,$account_service_id) {
        $request->user('afiliadoempresa')->authorizeRoles(['student']);
        
        $moment = SequenceMoment::
            where('sequence_moments.sequence_company_id', $sequence_id )
            ->where('sequence_moments.order',$order_moment_id )
            ->get()[0];

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
            return view('roles.student.moment_section',$data)->with('account_service_id',$account_service_id);
        }
    }
    
    public function get_available_sequences (Request $request,$company_id){
        
        $request->user('afiliadoempresa')->authorizeRoles(['student']);
        $tutor_id = ConectionAffiliatedStudents::select('id','tutor_company_id')
            ->whereHas('student_family',function($query)use($request,$company_id){
            $query->where([
                ['affiliated_company_id',$request->user('afiliadoempresa')->id],
                ['company_id',$company_id],
                ['rol_id',1]
            ]);
        })->first();
        $ids = AffiliatedAccountService::with('rating_plan')->whereHas('company_affilated',function($query)use($tutor_id){
            $query->where('id',$tutor_id->tutor_company_id);
        })->pluck('id');
       return AffiliatedContentAccountService::with('sequence')->whereIn('affiliated_account_service_id',$ids)->groupBy('affiliated_account_service_id')->get();

    }

    public function validation_access_sequence_content($account_service_id){
        $affiliatedAccountService = AffiliatedAccountService::find($account_service_id);
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
            }else{
                dd('No tiene permiso para ingresar, no es plan por secuencias ni por momentos');
            }
        }else{
            dd('no tiene permiso para ingresar');
        }

    }

}
