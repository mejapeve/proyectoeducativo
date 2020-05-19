<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function register_update_answer (Request $request){

        if(@json_decode($request->answer)){
            $answer = Answer::updateOrCreate(
                [
                    //'student_affiliated_company_id' => $request->student_affiliated_company_id,
                    'student_affiliated_company_id' => $request->student_affiliated_company_id,
                    'company_id' => $request->company_id,
                    //'affiliated_account_service_id'=>$request->affiliated_account_service_id,
                    'affiliated_account_service_id'=>1,
                    'question_id'=>$request->question_id,
                ]
                ,
                [
                    'answer' =>$request->answer,
                    'feedback' => $request->feedback,
                    'teacher_affiliated_company_id' => $request->teacher_affiliated_company_id,
                    'date_evaluation' => Carbon::now()
                ]
            );
            return response()->json(['data'=>$answer,'message','Respuesta registrada o actualizada'],200);
        }
        return response()->json(['data'=>'','message','El formato para registrar o actualizar los datos de respuesta no es el correcto'],200);

    }
    public function get_answers (Request $request){

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
            $data['tittle'] = $answer->question->tittle;
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
