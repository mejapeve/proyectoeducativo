<?php

namespace App\Http\Controllers;

use App\Mail\SendReportAnswerTutor;
use App\Models\AdvanceLine;
use App\Models\AfiliadoEmpresa;
use App\Models\Answer;
use App\Models\CompanySequence;
use App\Models\SequenceMoment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AnswerController extends Controller
{
    public function register_update_answer (Request $request){

        if(@json_decode($request->questions_answers)){
            $questions_answers = @json_decode($request->questions_answers);
            foreach ($questions_answers as $question_answer){
                //if(@json_decode($question_answer->answer)){
                    Answer::updateOrCreate(
                        [
                            'student_affiliated_company_id' => $request->student_affiliated_company_id,
                            'company_id' => $request->company_id,
                            'affiliated_account_service_id'=>$request->affiliated_account_service_id,
                            'question_id'=>$question_answer->question_id,
                        ]
                        ,
                        [
                            'answer' =>$question_answer->answer,
                            //'feedback' => $request->feedback, v2
                            //'teacher_affiliated_company_id' => $request->teacher_affiliated_company_id, v2
                            'date_evaluation' => Carbon::now()
                        ]
                    );
                //}
            }
            $student = AfiliadoEmpresa::find($request->student_affiliated_company_id);
            $tutor = AfiliadoEmpresa::whereHas('affiliated_company',function($query)use($request,$student){
                $query->whereHas('conection_tutor',function($query)use($student,$request){
                    $query->where('student_company_id',$student->affiliated_company->where('rol_id',1)->where('company_id',$request->company_id)->first()->id);
                })->where([
                    ['rol_id',3],
                    ['company_id',$request->company_id]
                ]);
            })->first();
            //$tutor = AfiliadoEmpresa::find(1);
            //dd($tutor->email);
            //agregar reporte por los momentos - pendiente por definir de estrategica
            /*
            $advanceLine = AdvanceLine::where([
                ['affiliated_company_id',$request->student_affiliated_company_id],
                ['affiliated_account_service_id',$request->student_affiliated_company_id],
                ['sequence_id',$request->sequence_id],
                ['moment_id',$request->moment_id]
            ])->orderBy('moment_id', 'ASC')->orderBy('moment_section_id', 'ASC')->get();*/
            $reportAnswers = $this->get_answers($request);
            $performance =  (collect($reportAnswers)->sum('review_student')/500) * 100;
            if( $performance >= 90 ){
                $performance_comment = "Las respuestas evidencian un buen proceso de aprendizaje. ¡Felicitaciones! ";
                $level = "nivel superior (S) 90 – 100%.";
            }else{
                if($performance >= 70 && $performance <= 89 ){
                    $performance_comment = "Los aprendizajes se están afianzando, se debe continuar en el proceso. ";
                    $level = "nivel alto (A) 70 – 89%.";
                }else{
                    $performance_comment = "Recomendamos revisar de nuevo las Experiencias científicas y los conceptos claves presentados en las explicaciones de Ciencia en contexto";
                    $level = "nivel básico (B) 0 – 69%.";
                }
            }
            $sequence = CompanySequence::select('name')->where('id',$request->sequence_id)->first();
            $moment = SequenceMoment::select('name')->where('id',$request->moment_id)->first();
            Mail::to( $tutor->email)->send(new SendReportAnswerTutor($tutor,$student,$reportAnswers,$sequence,$moment,$level,$performance_comment));
            return response()->json(['data'=>'','message','Respuestas registradas o actualizadas, se ha notificado al familiar las respuestas'],200);
        }
        return response()->json(['data'=>'','message','El formato para registrar o actualizar los datos de respuesta no es el correcto'],200);

    }
    public function get_answers (Request $request){
//dd($request);
       $answers =  Answer::with('question')->whereHas('question',function ($query)use($request){
            $query->where([
                ['sequence_id','=',$request->sequence_id],
                ['moment_id','=',$request->moment_id],
                ['experience_id','=',$request->experience_id]
            ]);
        })->where([
            ['student_affiliated_company_id',$request->student_affiliated_company_id],
            ['company_id',$request->company_id]
        ])->get();
        $questions = [];
        foreach ($answers as $answer){
            $data = $this->get_answer_student($answer->answer,$answer->question->options,$answer->question->review);
            $data['title'] = $answer->question->title;
            array_push($questions,$data);
        }
       return $questions;
    }

    public function get_answer_student($option_id,$options,$reviews){

        $data = [];
        $options = collect(@json_decode($options));
        $reviews = collect(@json_decode($reviews));
        $data['answer_student'] = $options->firstWhere('id', $option_id)->option;
        $data['review_student'] = $reviews->firstWhere('id', $option_id)->review;
        $data['answer_question'] =  $options->firstWhere('id', $reviews->firstWhere('review', '100')->id)->option;
        $option_id == $reviews->firstWhere('review', '100')->id ? $data['is_correct'] = true : $data['is_correct'] = false;

        return $data;
    }

}
