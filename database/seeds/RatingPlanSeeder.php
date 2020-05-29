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
                    "descrption"=>'Acceso limitado a 1 guía de aprendizaje, esta prueba solo estará activa por 15 días',
                    "description_items"=>'Acceso limitado a 1 guía de aprendizaje|Esta prueba solo estará activa por 15 días|Lorem ipsum dolor sit amet, consectetuer',
                    "url_image" => "/images/kits-elements/ezgif-3e721b0d38a8.jpg",
                    "price"=>2050,
                    "is_free"=>true,
                    "type_rating_plan_id"=>1,//secuencia
                    "count"=>1,
                    "days"=>15,
                    "init_date"=>'2020-05-01',
                    "expiration_date"=>null,
                ],
                [
                    "name"=>"Plan por 2 meses",
                    "descrption"=>'acceso completo a 1 guía de aprendizaje, acceso por 2 meses',
                    "description_items"=>'Acceso completo a 1 guía de aprendizaje|Acceso por 2 meses|Lorem ipsum dolor sit amet, consectetuer',
                    "url_image" => "/images/kits-elements/ezgif-3e721b0d38a8.jpg",
                    "price"=>2100,
                    "is_free"=>false,
                    "type_rating_plan_id"=>1,//secuencia
                    "count"=>1,
                    "days"=>60,
                    "init_date"=>'2020-05-01',
                    "expiration_date"=>null,
                ],
                [
                    "name"=>"Plan por 4 meses",
                    "descrption"=>'acceso completo a 2 guías de aprendizaje, acceso por 4 meses',
                    "description_items"=>'Acceso completo a 2 guías de aprendizaje|Acceso por 4 meses|Lorem ipsum dolor sit amet, consectetuer',
                    "url_image" => "/images/kits-elements/ezgif-3e721b0d38a8.jpg",
                    "price"=>2150,
                    "is_free"=>false,
                    "type_rating_plan_id"=>1,//secuencia
                    "count"=>2,
                    "days"=>120,
                    "init_date"=>'2020-05-01',
                    "expiration_date"=>null,
                ],
                [
                    "name"=>"Plan por 8 meses",
                    "descrption"=>'acceso completo a 4 guías de aprendizaje, acceso por 8 meses',
                    "description_items"=>'Acceso completo a 4 guías de aprendizaje|Acceso por 8 meses|Lorem ipsum dolor sit amet, consectetuer',
                    "url_image" => "/images/kits-elements/ezgif-3e721b0d38a8.jpg",
                    "price"=>2200,
                    "is_free"=>false,
                    "type_rating_plan_id"=>1,//secuencia
                    "count"=>4,
                    "days"=>240,
                    "init_date"=>'2020-05-01',
                    "expiration_date"=>null,
                ],
                [
                    "name"=>"Plan por 12 meses",
                    "descrption"=>'acceso completo a 6 guías de aprendizaje, acceso por 12 meses',
                    "description_items"=>'Acceso completo a 6 guías de aprendizaje|Acceso por 12 meses|Lorem ipsum dolor sit amet, consectetuer',
                    "url_image" => "/images/kits-elements/ezgif-3e721b0d38a8.jpg",
                    "price"=>2250,
                    "is_free"=>false,
                    "type_rating_plan_id"=>1,//secuencia
                    "count"=>6,
                    "days"=>360,
                    "init_date"=>'2020-05-01',
                    "expiration_date"=>null,
                ],
                [
                    "name"=>"Plan por momento",
                    "descrption"=>'acceso completo a los momentos que desee de guia de aprendizaje',
                    "description_items"=>'Acceso completo a los momentos que desee de guia de aprendizaje|Acceso por 10 días|Lorem ipsum dolor sit amet, consectetuer',
                    "url_image" => "/images/kits-elements/ezgif-3e721b0d38a8.jpg",
                    "price"=>2300,
                    "is_free"=>false,
                    "type_rating_plan_id"=>2,//momento
                    "count"=>4,//las que desee (validar desde el front esta cantidad para que pueda seleccionar las que desee)
                    "days"=>10,
                    "init_date"=>'2020-05-01',
                    "expiration_date"=>null,
                ],
                [
                    "name"=>"Plan por experiencia",
                    "descrption"=>'acceso completo a las experiencias que desee de guia de aprendizaje',
                    "description_items"=>'Acceso completo a las experiencias que desee de guia de aprendizaje|Acceso por 10 días|Lorem ipsum dolor sit amet, consectetuer',
                    "url_image" => "/images/kits-elements/ezgif-3e721b0d38a8.jpg",
                    "price"=>2350,
                    "is_free"=>false,
                    "type_rating_plan_id"=>3,//experiencia
                    "count"=>0,//las que desee (validar desde el front esta cantidad para que pueda seleccionar las que desee)
                    "days"=>10,
                    "init_date"=>'2020-05-01',
                    "expiration_date"=>null,
                ]
            ];
        foreach ($rating_plans as $rating_plan){
            $ratingPlan = new RatingPlan();
            $ratingPlan->name = $rating_plan['name'];
            $ratingPlan->description = $rating_plan['descrption'];
            if(isset($rating_plan['description_items'])) {
            $ratingPlan->description_items = $rating_plan['description_items'];
            }
            $ratingPlan->image_url  = $rating_plan['url_image'];
            $ratingPlan->price = $rating_plan['price'];
            $ratingPlan->is_free = $rating_plan['is_free'];
            $ratingPlan->type_rating_plan_id = $rating_plan['type_rating_plan_id'];
            $ratingPlan->count = $rating_plan['count'];
            $ratingPlan->days = $rating_plan['days'];
            $ratingPlan->init_date = $rating_plan['init_date'];
            $ratingPlan->expiration_date = $rating_plan['expiration_date'];
            if($rating_plan['is_free']){
                $ratingPlan->sequence_free_id = 1;
                $ratingPlan->moment_free_ids = '1,2,3';
            }
            $ratingPlan->save();
        }

    }
}
