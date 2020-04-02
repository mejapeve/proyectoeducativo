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
                    "type_rating_plan_id"=>1,//secuencia
                    "count"=>1,
                    "days"=>15
                ],
                [
                    "name"=>"Plan por 2 meses",
                    "descrption"=>'acceso completo a 1 guía de aprendizaje, acceso por 2 meses',
                    "url_image" => "/images/kits-elements/ezgif-3e721b0d38a8.jpg",
                    "price"=>"198000",
                    "is_free"=>false,
                    "type_rating_plan_id"=>1,//secuencia
                    "count"=>1,
                    "days"=>60
                ],
                [
                    "name"=>"Plan por 4 meses",
                    "descrption"=>'acceso completo a 2 guías de aprendizaje, acceso por 4 meses',
                    "url_image" => "/images/kits-elements/ezgif-3e721b0d38a8.jpg",
                    "price"=>"198000",
                    "is_free"=>false,
                    "type_rating_plan_id"=>1,//secuencia
                    "count"=>2,
                    "days"=>120
                ],
                [
                    "name"=>"Plan por 8 meses",
                    "descrption"=>'acceso completo a 4 guías de aprendizaje, acceso por 8 meses',
                    "url_image" => "/images/kits-elements/ezgif-3e721b0d38a8.jpg",
                    "price"=>"198000",
                    "is_free"=>false,
                    "type_rating_plan_id"=>1,//secuencia
                    "count"=>4,
                    "days"=>240
                ],
                [
                    "name"=>"Plan por 12 meses",
                    "descrption"=>'acceso completo a 6 guías de aprendizaje, acceso por 12 meses',
                    "url_image" => "/images/kits-elements/ezgif-3e721b0d38a8.jpg",
                    "price"=>"198000",
                    "is_free"=>false,
                    "type_rating_plan_id"=>1,//secuencia
                    "count"=>6,
                    "days"=>360
                ],
                [
                    "name"=>"Plan por momento",
                    "descrption"=>'acceso completo a los momentos que desee de guia de aprendiazaje',
                    "url_image" => "/images/kits-elements/ezgif-3e721b0d38a8.jpg",
                    "price"=>"198000",
                    "is_free"=>false,
                    "type_rating_plan_id"=>2,//momento
                    "count"=>0,//las que desee (validar desde el front esta cantidad para que pueda seleccionar las que desee)
                    "days"=>10
                ],
                [
                    "name"=>"Plan por experiencia",
                    "descrption"=>'acceso completo a las experiencias que desee de guia de aprendiazaje',
                    "url_image" => "/images/kits-elements/ezgif-3e721b0d38a8.jpg",
                    "price"=>"198000",
                    "is_free"=>false,
                    "type_rating_plan_id"=>3,//experiencia
                    "count"=>0,//las que desee (validar desde el front esta cantidad para que pueda seleccionar las que desee)
                    "days"=>10
                ]
            ];
        foreach ($rating_plans as $rating_plan){
            $ratingPlan = new RatingPlan();
            $ratingPlan->name = $rating_plan['name'];
            $ratingPlan->description = $rating_plan['descrption'];
            $ratingPlan->image_url  = $rating_plan['url_image'];
            $ratingPlan->price = $rating_plan['price'];
            $ratingPlan->is_free = $rating_plan['is_free'];
            $ratingPlan->type_rating_plan_id = $rating_plan['type_rating_plan_id'];
            $ratingPlan->count = $rating_plan['count'];
            $ratingPlan->days = $rating_plan['days'];
            $ratingPlan->save();
        }

    }
}
