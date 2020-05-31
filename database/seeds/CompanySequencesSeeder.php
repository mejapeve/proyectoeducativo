<?php

use Illuminate\Database\Seeder;
use App\Models\CompanySequence;
use App\Models\Kit;
use App\Models\MomentKits;
use App\Models\Element;
use App\Models\KitElement;
use App\Models\SequenceMoment;
use App\Models\MomentExperience;

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
                [ "id"=>"3","name"=> "El almanaque maravilloso", "areas" => "La Tierra y el universo (Los cuerpos celestes y sus movimientos)", "themes" => "Física", "description" => "Identificar y comparar la relación de los movimientos de la Luna, el Sol, y la Tierra en el transcurso de un año desde una perspectiva local."],
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
                [ "id"=>"20","name"=>"A la medida de tu imaginación", "areas" => "Unidades e instrumentos de medida", "themes" => "Biología| Física y Química", "description" => "Comprender la importancia de la medición en la vida cotidiana y establecer relaciones entre magnitudes físicas y sus unidades de medida."],
                [ "id"=>"21","name"=>"Somos lo que comemos", "areas" => "Procesos vitales", "themes" => "Biología", "description" => "Identificar los procesos de nuestro organismo para obtener la energía que necesita para mantener sus funciones vitales."],
            ];

        foreach ($secuences as $secuence){
            $sequenceN = new CompanySequence();
            $sequenceN->company_id = 1;
            $index = $secuence['id'];
            $sequenceN->name = $secuence['name'];
            $sequenceN->description = $secuence['description'];
            $sequenceN->url_image = 'images/sequences/sequence'.$index.'/caratula '.$index.'.png';
            $sequenceN->url_slider_images = 'images/sequences/sequence20/slider_images/slide-1.jpg|images/sequences/sequence'.$index.'/slider_images/slide-2.jpg|images/sequences/sequence'.$index.'/slider_images/slide-3.jpg|images/sequences/sequence'.$index.'/slider_images/slide-4.jpg';
            $sequenceN->keywords = 'Unidades medida|medición|longitud|masa|peso|volumen|tiempo';//$secuence['keywords'];
            $sequenceN->areas = $secuence['areas'];
            $sequenceN->url_vimeo = 'https://www.youtube.com/embed/u1iBFJIsIhw';
            $sequenceN->themes = $secuence['themes'];
            $sequenceN->objectives = 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed | Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed';
            $sequenceN->section_1 = '{"section":{"id":1,"name":"Situación Generadora"},"sequenceSectionIndex":"section_1","sequenceSectionPartIndex":"part_1","part_1":{"container":{"w":874,"h":489},"background_image":"images/sequences/sequence20/situacionGeradora-20.jpg"}}';
            $sequenceN->section_2 = '{"section":{"id":2,"name":"Ruta de viaje"},"sequenceSectionIndex":"section_2","sequenceSectionPartIndex":"part_1","part_1":{"container":{"w":874,"h":482},"background_image":"images/sequences/sequence20/rutaViaje-20.jpg"}}';
            $sequenceN->section_3 = '{"section":{"id":3,"name":"Guía de saberes"},"sequenceSectionIndex":"section_3","sequenceSectionPartIndex":"part_1","part_1":{"container":{"w":874,"h":385},"elements":[{"id":"20200512110438477","type":"image-element","url_image":"images/sequences/sequence20/bgSaberes-01.png","w":351,"h":386,"ml":-15,"mt":0,"$$hashKey":"object:638","bindWidthHeight":true},{"id":"20200512110539801","type":"image-element","url_image":"images/sequences/sequence20/btn1-01.png","w":204,"h":107,"ml":278,"mt":14,"$$hashKey":"object:913","bindWidthHeight":true},{"id":"20200512110611298","type":"image-element","url_image":"images/sequences/sequence20/btn2-01.png","w":204,"h":106,"ml":225,"mt":137,"$$hashKey":"object:1155","bindWidthHeight":true},{"id":"20200512110701901","type":"image-element","url_image":"images/sequences/sequence20/btn3-01.png","w":204,"h":107,"ml":215,"mt":269,"$$hashKey":"object:1430","bindWidthHeight":true}]}}';
            $sequenceN->section_4 = '{"section":{"id":4,"name":"Punto de encuentro"},"sequenceSectionIndex":"section_4","sequenceSectionPartIndex":"part_1","part_1":{"container":{"w":874,"h":385},"elements":[{"id":"20200512110821566","type":"image-element","url_image":"images/sequences/sequence20/puntoEncuentro-20.png","w":406,"h":274,"ml":450,"mt":111,"$$hashKey":"object:1913","bindWidthHeight":true}]}}';
            $sequenceN->save();
            
            $this->addMoment($sequenceN->id, 1, 2);
            $this->addMoment($sequenceN->id, 2, 2);
            $this->addMoment($sequenceN->id, 3, 2);
            $this->addMoment($sequenceN->id, 4, 2);
            $this->addMoment($sequenceN->id, 5, 2);
            $this->addMoment($sequenceN->id, 6, 2);
            $this->addMoment($sequenceN->id, 7, 2);
            $this->addMoment($sequenceN->id, 8, 2);
            

        }
    }
    
    public function addMoment($secuence_id,$moment_order,$experiences) {
            $momentN = new SequenceMoment();
            $momentN->sequence_company_id = $secuence_id;
            $momentN->order = $moment_order;
            $momentN->name = "moment ".$moment_order;
            $momentN->description = "";
            $momentN->objectives = "Comparar, agrupar y ordenar objetos a partir de sus características|Identificar la necesidad de medir en la vida cotidiana";
            $momentN->section_1 = '{"section":{"type":3,"name":"Experiencia científica"},"part_1":{"momentSectionPartIndex":"part_1","container":{"w":874,"h":385},"elements":[{"id":"20200512111245895","type":"text-element","fs":13,"ml":67,"mt":76,"w":100,"h":26,"text":"Parte 1","class":"font-weight-extra-bold"},{"id":"20200512111358665","type":"text-area-element","fs":12,"ml":100,"mt":122,"w":400,"h":200,"text":"Para el desarrollo de esta experiencia científica deben contar con el kit para armar la pista de esferas.\n \nPrimero, abran la caja donde están guardadas las partes de la pista, luego observen detenidamente cada una de las figuras."}]},"part_2":{},"part_3":{},"part_4":{},"momentSectionIndex":"0"}';
            $momentN->section_2 = '{"section":{"type":1,"name":"Pregunta Central"},"part_1":{"momentSectionPartIndex":"part_1","container":{"w":874,"h":385},"elements":[{"id":"20200512111052837","type":"text-element","fs":12,"ml":10,"mt":76,"w":100,"h":26,"text":"Porque medimos las cosas?"}]},"part_2":{},"part_3":{},"part_4":{},"momentSectionIndex":"0"}';
            $momentN->section_3 = '{"section":{"type":2,"name":"Ciencia en contexto"},"part_1":{"momentSectionPartIndex":"part_1","container":{"w":874,"h":385},"elements":[{"id":"20200512111425941","type":"text-element","fs":12,"ml":10,"mt":76,"w":100,"h":26,"text":"Ciencia en contexto"}]},"part_2":{},"part_3":{},"part_4":{},"momentSectionIndex":"2"}';
            $momentN->section_4 = '{"section":{"type":4,"name":"+ Conexiones"},"part_1":{"momentSectionPartIndex":"part_1","container":{"w":874,"h":385},"elements":[{"id":"20200512111440868","type":"text-element","fs":12,"ml":10,"mt":76,"w":100,"h":26,"text":"Ideas para más conexiones"}]},"part_2":{},"part_3":{},"part_4":{},"momentSectionIndex":"3"}';
            $momentN->save();
            
            for($i = 0; $i < $experiences; ++$i) {
                $experienceN = new MomentExperience();
                $experienceN->sequence_moment_id = $momentN->id;
                $experienceN->title = 'experience '.($i+1) .', moment '.$moment_order;
                $experienceN->decription = 'Experiencia científica';
                $experienceN->objectives = '';
                $experienceN->save();
            }

            $sequenceKitsN = new MomentKits();
            $sequenceKitsN->sequence_moment_id = $momentN->id;
            $sequenceKitsN->kit_id = 3;
            $sequenceKitsN->save();

            $sequenceKitsN = new MomentKits();
            $sequenceKitsN->sequence_moment_id = $momentN->id;
            $sequenceKitsN->kit_id = 4;
            $sequenceKitsN->save();

            $sequenceKitsN = new MomentKits();
            $sequenceKitsN->sequence_moment_id = $momentN->id;
            $sequenceKitsN->element_id = 1;
            $sequenceKitsN->save();
    }
}
