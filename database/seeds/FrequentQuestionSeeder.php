<?php

use Illuminate\Database\Seeder;

class FrequentQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $frequentQuestions = [
            ['question'=>'pregunta 1','answer'=>'respuesta 1'],
            ['question'=>'pregunta 2','answer'=>'respuesta 2'],
            ['question'=>'pregunta 3','answer'=>'respuesta 3'],
            ['question'=>'pregunta 4','answer'=>'respuesta 4'],
        ];

        foreach ($frequentQuestions as $frequentQuestion){
            $frequentQuestionN = new \App\Models\FrequentQuestion();
            $frequentQuestionN->question = $frequentQuestion['question'];
            $frequentQuestionN->answer = $frequentQuestion['answer'];
            $frequentQuestionN->save();
        }
    }
}
