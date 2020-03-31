<?php

use Illuminate\Database\Seeder;
use App\Models\CompanySequence;

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
                [ "id"=>"1","name"=>"Unidades de medida"],
            ];

			
        foreach ($secuences as $secuence){
            $sequenceN = new CompanySequence();
            $sequenceN->company_id = 1;
			$index = $secuence['id'];
            $sequenceN->name = $secuence['name'];
            $sequenceN->description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae justo enim. Fusce tellus leo, fringilla ut facilisis at, ultricies a lectus. Ut iaculis facilisis tellus dignissim lacinia. In commodo vulputate mi non cursus. Nulla facilisi. Aenean feugiat, ex id faucibus fermentum, sem sem condimentum lectus, volutpat ullamcorper nulla diam ac mauris. Curabitur eget mauris ligula. Donec sagittis urna et neque rutrum, nec lacinia turpis tincidunt. Morbi sed leo eget felis aliquet mollis non at nunc. Etiam venenatis elementum maximus. Morbi tincidunt ante nec lectus maximus viverra ut consectetur nulla.';
            $sequenceN->url_image = 'images/sequences/sequence'.$index.'/caratula '.$index.'.png';
            $sequenceN->url_slider_images = '';//$secuence['url_slider_images'];
            $sequenceN->keywords = '';//$secuence['keywords'];
            $sequenceN->areas = '';//$secuence['areas'];
            $sequenceN->themes = '';//$secuence['themes'];
			$sequenceN->objetives = 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed | Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed';
			$sequenceN->section_1 = '{"background_image":"images/sequences/sequence1/situacion-generadora-DF013E01.jpg","text1":"Observen a su alrededor. Seguramente encontrarán casas, estructuras y objetos que tienen diferentes formas y funciones. Muchas de estas construcciones alguna vez fueron solo un pensamiento, quizás un sueño que se hizo realidad a partir de la combinación estratégica de partes hechas de diferentes materiales y medidas.<br/><br/>Todos podemos imaginar y crear, así que queremos invitarlos a diseñar y construir una pista para hacer rodar canicas o esferas usando piezas de madera de diferentes formas y tamaños. La idea es que las canicas puedan pasar por diferentes caminos y que estos presenten algunos obstáculos durante el recorrido. ¿Cómo lo harán? Existen múltiples maneras de combinar las piezas, así que lo primero será dejar volar la imaginación, puesto que la creatividad es la clave para hacer la construcción más divertida. Luego deberán pensar ¿Qué tan alta quieren la pista? ¿Qué forma tendrá? ¿Cuánto espacio ocupará? ¿Cómo ensamblar las diferentes partes de acuerdo con su tamaño y peso? ¿Cómo pueden hacer para que las esferas se muevan más rápido?"}';
			$sequenceN->section_2 = '{"background_image":"images/sequences/sequence1/bombillo-01.png","button_1":{"x:10","y":10}}';
			$sequenceN->save();
        }
    }
}
