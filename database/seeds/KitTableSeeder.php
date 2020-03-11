<?php

use Illuminate\Database\Seeder;
use App\Models\Kit;

class KitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kits = 
            [
                [ 
                "name"=>"Kit Experimental Quimica",
                "price"=>"198000",
                "url_image" => "/images/kits-elements/ezgif-3e721b0d38a8.jpg",
                "description" => "Kit Experimental Quimica Beaker + Tripode + Erlenmeyer Etc..",
                "url_slider_images" => "/images/kits-elements/ezgif-3e721b0d38a8.jpg|/images/kits-elements/ezgif-1-3521bd91c92b.jpg"
                ],
                ["name"=>"Kit De Laboratorio Project Mc2 Mckeyla Mcaliste Juguete",
                "price"=>"984990",
                "url_image" => "/images/kits-elements/KIT1-8c14b4a14cc6.jpg",
                "description" => "bolsa de laboratorio de gran tamaño que se descomprime para revelar numerosas herramientas científicas que puedes usar para investigar en tu próxima misión juega y almacena todas las divertidas piezas de ciencia incluidas",
                "url_slider_images" => "/images/kits-elements/KIT1-8c14b4a14cc6.jpg|/images/kits-elements/KIT1-71243669f7e3.jpg|/images/kits-elements/KIT1-a39bcf420580.jpg|/images/kits-elements/KIT1-a744d81f2eba.jpg"
                ]
            ];
        foreach ($kits as $kit){
            $kitN = new Kit();
            $kitN->name = $kit['name'];
            $kitN->description = $kit['description'];
            $kitN->url_image = $kit['url_image'];
            $kitN->price = $kit['price'];
            $kitN->url_slider_images = $kit['url_slider_images'];
            $kitN->save();
        }
    }
}
