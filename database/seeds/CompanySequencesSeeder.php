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
                [ "id"=>"1","name"=> "Agua para todos", "areas" => "Agua", "themes" => "Biología", "description" => "Comprender la importancia del agua para la vida de todos los seres vivos y promover acciones de cuidado para su preservación."],
				[ "id"=>"2","name"=> "Los secretos de la cotidiana", "areas" => "Homeóstasis", "themes" => "Biología", "description" => "Reconocer las estrategias que utilizamos para enfrentar situaciones de estrés para mantener el control interno."],
				[ "id"=>"3","name"=> "Los increíbles viajes de yotopo por los cielos: el almanaque maravilloso", "areas" => "La Tierra y el universo (Los cuerpos celestes y sus movimientos)", "themes" => "Física", "description" => "Identificar y comparar la relación de los movimientos de la Luna, el Sol, y la Tierra en el transcurso de un año desde una perspectiva local."],
				[ "id"=>"4","name"=> "Todo en la vida es cambio", "areas" => "Evolución", "themes" => "Química", "description" => "Comprender las reacciones químicas como eventos en los que un conjunto específico de condiciones permite caracterizar los cambios que suceden para formar nuevas sustancias químicas."],
				[ "id"=>"5","name"=> "Caminando hacia el futuro de la mano de robots", "areas" => "Circuitos", "themes" => "Física", "description" => "Comprender el funcionamiento de algunos robots a partir de la caracterización de los circuitos eléctricos."],
				[ "id"=>"6","name"=> "Energía super poderosa", "areas" => "Energía", "themes" => "Física", "description" => "Caracterizar diferentes tipos de energía a partir de sus fuentes y transformaciones. Comprender la importancia de hacer un uso sostenible de los recursos energéticos."],
				[ "id"=>"7","name"=> "Las aventuras de mi helado en una tarde calurosa", "areas" => "Estados de la materia (cambios físicos)", "themes" => "Física y Química", "description" => "Identificar los factores y procesos que generan cambios de estado en la materia, reconociendo las características y formas que permiten diferenciar unos objetos de otros, y en algunos casos las sustancias que los componen."],
				[ "id"=>"8","name"=> "La esencia de la vida es el cambio", "areas" => "Evolución", "themes" => "Biología", "description" => "Comprender cómo se producen los cambios evolutivos en el tiempo."],
				[ "id"=>"9","name"=> "Los secretos de la vida cotidiana", "areas" => "Homeóstasis", "themes" => "Biología", "description" => ""],
				[ "id"=>"10","name"=>"El Juego de la vida. Un recorrido por la organización de los seres vivos", "areas" => "Organización de los seres vivos", "themes" => "Biología", "description" => "Identificar los diferentes niveles de organización de la vida y valorar las dinámicas propias de los seres vivos."],
				[ "id"=>"11","name"=>"Explorando el mundo de las máquinas", "areas" => "Máquinas simples", "themes" => "Física", "description" => "Comprender las características de las máquinas simples, así como su función y uso en la solución de problemas cotidianos"],
				[ "id"=>"12","name"=>"El alcohol en nuestras vidas", "areas" => "Materia", "themes" => "Química", "description" => "Comprender, desde el punto de vista de su composición química, algunos productos que hacen parte de nuestra vida diaria."],
				[ "id"=>"13","name"=>"El alcohol en nuestras vidas", "areas" => "Materia", "themes" => "Química", "description" => "Comprender, desde el punto de vista de su composición química, algunos productos que hacen parte de nuestra vida diaria."],
				[ "id"=>"14","name"=>"Crear con mezclas y colores", "areas" => "Mezclas", "themes" => "Química", "description" => "Comprender que lo que nos rodea está constituido por mezclas de diferentes materiales y reconocer algunas de sus principales características, así como posibilidades de uso."],
				[ "id"=>"15","name"=>"Trabajando para ordenar la naturaleza", "areas" => "Tabla Periódica", "themes" => "Química", "description" => "Comprender que la tabla periódica es un sistema de organización y clasificación de los elementos químicos que puede ser entendido como un ejemplo claro de una importante práctica científica, la sistematización de la naturaleza."],
				[ "id"=>"16","name"=>"Expedición por el mundo de la vida", "areas" => "Taxonomía", "themes" => "Biología", "description" => "Reconocer la diversidad de formas de vida y valorar su importancia en la dinámica del planeta."],
				[ "id"=>"17","name"=>"La ciencia de hacer mover la pelota", "areas" => "Velocidad", "themes" => "Física", "description" => "Identificar y comparar la distancia recorrida, así como la fuerza y la velocidad, en el movimiento de la pelota propio de los entrenamientos de fútbol."],
				[ "id"=>"18","name"=>"Las astroaventuras de Yotopo y la cápsula del tiempo", "areas" => "Astronomía", "themes" => "Física", "description" => "Registrar y analizar el movimiento del Sol, la Luna y las estrellas en el cielo para comprender cómo se relacionan estos con la medida del tiempo."],
				[ "id"=>"19","name"=>"Nuestros cuerpo : vida movimiento y sensaciones", "areas" => "El cuerpo, sus partes y cambios", "themes" => "Biología", "description" => "Reconocer el funcionamiento del cuerpo, valorarlo y tomar decisiones para su cuidado."],
				[ "id"=>"20","name"=>"A la medida de tu imaginación", "areas" => "Unidades e instrumentos de medida", "themes" => "Biología, Física y Química", "description" => "Comprender la importancia de la medición en la vida cotidiana y establecer relaciones entre magnitudes físicas y sus unidades de medida."],
				[ "id"=>"21","name"=>"Somos lo que comemos", "areas" => "Procesos vitales", "themes" => "Biología", "description" => "Identificar los procesos de nuestro organismo para obtener la energía que necesita para mantener sus funciones vitales."],
            ];

        foreach ($secuences as $secuence){
            $sequenceN = new CompanySequence();
            $sequenceN->company_id = 1;
			$index = $secuence['id'];
            $sequenceN->name = $secuence['name'];
            $sequenceN->description = $secuence['description'];
            $sequenceN->url_image = 'images/sequences/sequence'.$index.'/caratula '.$index.'.png';
            $sequenceN->url_slider_images = 'images/sequences/sequence'.$index.'/slider_images/slide-1.jpg|images/sequences/sequence'.$index.'/slider_images/slide-2.jpg|images/sequences/sequence'.$index.'/slider_images/slide-3.jpg|images/sequences/sequence'.$index.'/slider_images/slide-4.jpg';
            $sequenceN->keywords = 'Unidades medida, medición, longitud, masa, peso, volumen, tiempo';//$secuence['keywords'];
            $sequenceN->areas = $secuence['areas'];
            $sequenceN->themes = $secuence['themes'];
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
