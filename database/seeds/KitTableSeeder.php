<?php

use Illuminate\Database\Seeder;
use App\Models\Kit;
use App\Models\Element;
use App\Models\KitElement;

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
                "price"=>2000,
                "url_image" => "/images/kits-elements/ezgif-3e721b0d38a8.jpg",
                "description" => "Kit Experimental Quimica Beaker + Tripode + Erlenmeyer Etc..",
                "url_slider_images" => "/images/kits-elements/ezgif-3e721b0d38a8.jpg|/images/kits-elements/ezgif-1-3521bd91c92b.jpg"
                ],
                ["name"=>"Kit De Laboratorio Project Mc2 Mckeyla Mcaliste Juguete",
                "price"=>3000,
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
        
        
        
        /// Others Kits
        
        $kitN = new Kit();
        $kitN->name = 'Kit de canicas';
        $kitN->description = 'Kit de canicas + Telescopio.';
        $kitN->url_image = '/images/kits-elements/kit-2/dotacionLaboratorio2.jpg';
        $kitN->price = 2000;
        $kitN->url_slider_images = '/images/kits-elements/kit-2/dotacionLaboratorio2.jpg|/images/kits-elements/kit-2/Captura de Pantalla 2020-03-13 a la(s) 4.38.32 p. m.png';
        $kitN->save();
        
        $elementN = new Element();
        $elementN->name='Telescopio';
        $elementN->description='Telescopio que permite realizar la guia de aprendizaje "A la medida de tu imaginación".';
        $elementN->url_image="/images/kits-elements/element-1/telescopio.png";
        $elementN->url_slider_images="/images/kits-elements/element-1/telescopio.png|/images/kits-elements/element-1/telescopio2.jpg";
        $elementN->price = 2000;
        $elementN->save();
        
        $kitElementN = new KitElement();
        $kitElementN->kit_id = $kitN->id;
        $kitElementN->element_id = $elementN->id;
        $kitElementN->save();

        $kitN = new Kit();
        $kitN->name = 'Kit de laboratorio';
        $kitN->description = 'Kit de laboratorio';
        $kitN->url_image = '/images/kits-elements/kit-1/dotacionLaboratorios1.jpg';
        $kitN->price =2000;
        $kitN->url_slider_images = '/images/kits-elements/kit-1/dotacionLaboratorios1.jpg|/images/kits-elements/kit-1Captura de Pantalla 2020-03-13 a la(s) 4.38.18 p. m..png';
        $kitN->save();
    }
}
