<?php

use Illuminate\Database\Seeder;
use App\Models\RatingPlan;

class RatingPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $rating_plans =
            [
                [
                    "name"=>"Prueba gratuita por 15 días",
                    "descrption"=>'acceso limitado a 1 guía de aprendizaje, esta prueba solo estará activa por 15 días',
                    "url_image" => "/images/kits-elements/ezgif-3e721b0d38a8.jpg",
                    "price"=>"198000",
                    "is_free"=>true,
                    "sequence_include"=>null,
                    "moments_included"=>null,
                    "experiences_included"=>null,
                    "sequence_company_ids"=>'1',
                    "sequence_moment_ids"=>null,
                    "sequence_experience_ids"=>15,
                ],
                [
                    "name"=>"Plan por 2 meses",
                    "descrption"=>'acceso completo a 1 guía de aprendizaje, acceso por 2 meses',
                    "url_image" => "/images/kits-elements/ezgif-3e721b0d38a8.jpg",
                    "price"=>"198000",
                    "is_free"=>false,
                    "sequence_include"=>1,
                    "moments_included"=>null,
                    "experiences_included"=>null,
                    "sequence_company_ids"=>'1',
                    "sequence_moment_ids"=>null,
                    "sequence_experience_ids"=>30,
                ],
                [
                    "name"=>"Plan por 4 meses",
                    "descrption"=>'acceso completo a 2 guías de aprendizaje, acceso por 4 meses',
                    "url_image" => "/images/kits-elements/ezgif-3e721b0d38a8.jpg",
                    "price"=>"198000",
                    "is_free"=>false,
                    "sequence_include"=>2,
                    "moments_included"=>null,
                    "experiences_included"=>null,
                    "sequence_company_ids"=>'1,2',
                    "sequence_moment_ids"=>null,
                    "sequence_experience_ids"=>60,
                ]
            ];
        foreach ($rating_plans as $rating_plan){
            $ratingPlan = new RatingPlan();
            $ratingPlan->name = $rating_plan['name'];
            $ratingPlan->name = $rating_plan['name'];
            $ratingPlan->description = $rating_plan['descrption'];
            $ratingPlan->image_url  = $rating_plan['url_image'];
            $ratingPlan->price = $rating_plan['price'];
            $ratingPlan->is_free = $rating_plan['is_free'];
            $ratingPlan->sequences_included = $rating_plan['sequence_include'];
            $ratingPlan->moments_included = $rating_plan['moments_included'];
            $ratingPlan->experiences_included = $rating_plan['experiences_included'];
            $ratingPlan->sequence_company_ids = $rating_plan['sequence_company_ids'];
            $ratingPlan->sequence_moment_ids = $rating_plan['sequence_moment_ids'];
            $ratingPlan->sequence_experience_ids = $rating_plan['sequence_experience_ids'];
            $ratingPlan->save();
        }

    }
}
