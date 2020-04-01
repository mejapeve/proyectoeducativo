<?php

use Illuminate\Database\Seeder;
use App\Models\CompanySequence;
use App\Models\Kit;
use App\Models\SequenceKits;
use App\Models\Element;
use App\Models\KitElement;

class CompanySequencesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $secuences = [
                [ "id"=>"1","name"=> "Agua para todos"],
				[ "id"=>"2","name"=> "Los secretos de la cotidiana"],
				[ "id"=>"3","name"=> "Los increíbles viajes de yotopo por los cielos : el almanaque maravilloso"],
				[ "id"=>"4","name"=> "Todo en la vida es cambio"],
				[ "id"=>"5","name"=> "Caminando hacia el futuro de la mano de robots"],
				[ "id"=>"6","name"=> "Energía super poderosa"],
				[ "id"=>"7","name"=> "Las aventuras de mi helado en una tarde calurosa"],
				[ "id"=>"8","name"=> "¿Cambio, transformación o evolucion?"],
				[ "id"=>"9","name"=> "Los secretos de la vida cotidiana"],
				[ "id"=>"10","name"=>"Zoom , el juego de la vida"],
				[ "id"=>"11","name"=>"Explorando el mundo de las máquinas"],
				[ "id"=>"12","name"=>"El alcohol en nuestras vidas"],
				[ "id"=>"13","name"=>"El alcohol en nuestras vidas"],
				[ "id"=>"14","name"=>"Crear con mezclas y colores"],
				[ "id"=>"15","name"=>"Trabajando para ordenar la naturaleza"],
				[ "id"=>"16","name"=>"Expedición por el mundo de la vida"],
				[ "id"=>"17","name"=>"La ciencia de hacer mover la pelota"],
				[ "id"=>"18","name"=>"Las astroaventuras de yotopo"],
				[ "id"=>"19","name"=>"Nuestros cuerpo : vida movimiento y sensaciones"],
				[ "id"=>"20","name"=>"A la medida de tu imaginación"],
				[ "id"=>"21","name"=>"Somos lo que comemos"]
            ];

        foreach ($secuences as $secuence){
            $sequenceN = new CompanySequence();
            $sequenceN->company_id = 1;
			$index = $secuence['id'];
            $sequenceN->name = $secuence['name'];
            $sequenceN->description = 'Comprender la importancia de la medición en la vida cotidiana y establecer relaciones entre magnitudes físicas y sus unidades de medida..';
            $sequenceN->url_image = 'images/sequences/sequence'.$index.'/caratula '.$index.'.png';
            $sequenceN->url_slider_images = 'images/sequences/sequence'.$index.'/slider_images/slide-secuencia-1.png|images/sequences/sequence'.$index.'/slider_images/slide-secuencia-2.png|images/sequences/sequence'.$index.'/slider_images/slide-secuencia-3.png|images/sequences/sequence'.$index.'/slider_images/slide-secuencia-4.png|images/sequences/sequence'.$index.'/slider_images/slide-secuencia-5.png';
            $sequenceN->keywords = 'Unidades medida, medición, longitud, masa, peso, volumen, tiempo';//$secuence['keywords'];
            $sequenceN->areas = 'Ciencias naturales, Física, Matemáticas';//$secuence['areas'];
            $sequenceN->themes = '';//$secuence['themes'];
			$sequenceN->objetives = 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed | Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed';
			$sequenceN->section_1 = '{"background_image":"images/sequences/sequence1/situacion-generadora.jpg","text1":"Observen a su alrededor. Seguramente encontrarán casas, estructuras y objetos que tienen diferentes formas y funciones. Muchas de estas construcciones alguna vez fueron solo un pensamiento, quizás un sueño que se hizo realidad a partir de la combinación estratégica de partes hechas de diferentes materiales y medidas.<br/><br/>Todos podemos imaginar y crear, así que queremos invitarlos a diseñar y construir una pista para hacer rodar canicas o esferas usando piezas de madera de diferentes formas y tamaños. La idea es que las canicas puedan pasar por diferentes caminos y que estos presenten algunos obstáculos durante el recorrido. ¿Cómo lo harán? Existen múltiples maneras de combinar las piezas, así que lo primero será dejar volar la imaginación, puesto que la creatividad es la clave para hacer la construcción más divertida. Luego deberán pensar ¿Qué tan alta quieren la pista? ¿Qué forma tendrá? ¿Cuánto espacio ocupará? ¿Cómo ensamblar las diferentes partes de acuerdo con su tamaño y peso? ¿Cómo pueden hacer para que las esferas se muevan más rápido?"}';
			$sequenceN->section_2 = '';
			$sequenceN->save();
			
			if($index == "20") {
				$kits = 
					[
						["name"=>"Kit de canicas",
						"price"=>"984990",
						"url_image" => "/images/kits-elements/kit-2/dotacionLaboratorio2.jpg",
						"description" => "Kit de canicas + Telescopio.",
						"url_slider_images" => "/images/kits-elements/kit-2/dotacionLaboratorio2.jpg|/images/kits-elements/kit-2/Captura de Pantalla 2020-03-13 a la(s) 4.38.32 p. m..png"
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
					
					$sequenceKitsN = new SequenceKits();
					$sequenceKitsN->company_sequence_id = $sequenceN->id;
					$sequenceKitsN->kit_id = $kitN->id;
					$sequenceKitsN->save();
					
					if($kitN->name == "Kit de canicas") {
						$elementN = new Element();
						$elementN->name='Telescopio';
						$elementN->description='Telescopio que permite realizar la guia de aprendizaje "A la medida de tu imaginación".';
						$elementN->url_image="/images/kits-elements/element-1/telescopio.png";
						$elementN->url_slider_images="/images/kits-elements/element-1/telescopio.png|/images/kits-elements/element-1/telescopio2.jpg";
						$elementN->price = '90';
						$elementN->save();
						
						$kitElementN = new KitElement();
						$kitElementN->kit_id = $kitN->id;
						$kitElementN->element_id = $elementN->id;
						$kitElementN->save();
					}
				}
			}
			
			if($index == "1") {
				$kits = 
					[
						[ 
						"name"=>"Kit de laboratorio",
						"price"=>"198000",
						"url_image" => "/images/kits-elements/kit-1/dotacionLaboratorios1.jpg",
						"description" => "Kit de laboratorio.",
						"url_slider_images" => "/images/kits-elements/kit-1/dotacionLaboratorios1.jpg|/images/kits-elements/kit-1Captura de Pantalla 2020-03-13 a la(s) 4.38.18 p. m..png"
						],
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
    }
}
