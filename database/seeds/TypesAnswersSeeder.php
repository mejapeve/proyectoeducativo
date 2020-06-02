<?php

use Illuminate\Database\Seeder;

class TypesAnswersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $types =
            [
                ["name"=>'abierta'],
                ["name"=>'cerrada - unica respuesta'],
                ["name"=>'cerrada - multiple respuesta'],

            ];
        foreach ($types as $type){
            $typeN = new \App\Models\TypeAnswer();
            $typeN->name = $type['name'];
            $typeN->save();
        }
    }
}
