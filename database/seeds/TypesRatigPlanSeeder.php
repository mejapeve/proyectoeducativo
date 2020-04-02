<?php

use Illuminate\Database\Seeder;
use App\Models\TypesRatingPlan;

class TypesRatigPlanSeeder extends Seeder
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
                ["name"=>'secuencia'],
                ["name"=>'momento'],
                ["name"=>'experiencia'],

            ];
        foreach ($types as $type){
            $typeN = new TypesRatingPlan();
            $typeN->name = $type['name'];
            $typeN->save();
        }

    }
}
