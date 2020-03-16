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
        $secuences = 
            [
                [ "url_slider_images"=>"/images/company-sequences/sequence1-123add2.png|/images/company-sequences/sequence2-123add2.png|/images/company-sequences/sequence3-123add2.png|/images/company-sequences/sequence4-123add2.png",
                  "url_image"=>"/images/company-sequences/sequence1-123add2.png",
                  "themes"=>"ciencia en contexto","areas"=>"Ciencias de la vida",
                  
                   "id"=>"1","name"=>"Health Wellness","keywords"=>"health,fitness,related,fitness"],
                [ "url_image"=>"/images/company-sequences/sequence2-123add2.png",
                "themes"=>"Astronomía","areas"=>"Física","id"=>"2","name"=>"Business Professional","keywords"=>"health,fitness,related,fitness","url_slider_images"=>"/images/company-sequences/sequence1-123add2.png|/images/company-sequences/sequence2-123add2.png|/images/company-sequences/sequence3-123add2.png|/images/company-sequences/sequence4-123add2.png"],
                [ "url_image"=>"/images/company-sequences/sequence3-123add2.png",
                "themes"=>"Cultura","areas"=>"Física,Química,Astronomía","id"=>"3","name"=>"Performing Visual Arts","keywords"=>"health,fitness,related,fitness","url_slider_images"=>"/images/company-sequences/sequence1-123add2.png|/images/company-sequences/sequence2-123add2.png|/images/company-sequences/sequence3-123add2.png|/images/company-sequences/sequence4-123add2.png"],
                [ "url_image"=>"/images/company-sequences/sequence4-123add2.png",
                "themes"=>"Arte","areas"=>"Química,Biología,Geología","id"=>"4","name"=>"Science Technology","keywords"=>"health,fitness,related,fitness","url_slider_images"=>"/images/company-sequences/sequence1-123add2.png|/images/company-sequences/sequence2-123add2.png|/images/company-sequences/sequence3-123add2.png|/images/company-sequences/sequence4-123add2.png"],
                [ "url_image"=>"/images/company-sequences/sequence1-123add2.png",
                "themes"=>"Música","areas"=>"Ciencias de la vida","id"=>"5","name"=>"Sports Fitness","keywords"=>"womens,health,fitness","url_slider_images"=>"/images/company-sequences/sequence1-123add2.png|/images/company-sequences/sequence2-123add2.png|/images/company-sequences/sequence3-123add2.png|/images/company-sequences/sequence4-123add2.png"],
                [ "url_image"=>"/images/company-sequences/sequence2-123add2.png",
                "themes"=>"ciencia en contexto","areas"=>"Ciencias físicas","id"=>"6","name"=>"Charity Causes","keywords"=>"womens,health,fitness","url_slider_images"=>"/images/company-sequences/sequence1-123add2.png|/images/company-sequences/sequence2-123add2.png|/images/company-sequences/sequence3-123add2.png|/images/company-sequences/sequence4-123add2.png"],
                [ "url_image"=>"/images/company-sequences/sequence4-123add2.png",
                "themes"=>"ciencia en contexto","areas"=>"Ciencias de la Tierra","id"=>"7","name"=>"Film Media","keywords"=>"great,lakes,health and fitness","url_slider_images"=>"/images/company-sequences/sequence1-123add2.png|/images/company-sequences/sequence2-123add2.png|/images/company-sequences/sequence3-123add2.png|/images/company-sequences/sequence4-123add2.png"],
                [ "url_image"=>"/images/company-sequences/sequence3-123add2.png",
                "themes"=>"ciencia en contexto","areas"=>"Ciencias de la Tierra","id"=>"8","name"=>"Fashion Beauty","keywords"=>"health,fitness,related,fitness","url_slider_images"=>"/images/company-sequences/sequence1-123add2.png|/images/company-sequences/sequence2-123add2.png|/images/company-sequences/sequence3-123add2.png|/images/company-sequences/sequence4-123add2.png"],
                [ "url_image"=>"/images/company-sequences/sequence1-123add2.png",
                "themes"=>"ciencia en contexto","areas"=>"Química,Biología,Geología","id"=>"9","name"=>"Travel Outdoor","keywords"=>"corporation,recipes,magazine","url_slider_images"=>"/images/company-sequences/sequence1-123add2.png|/images/company-sequences/sequence2-123add2.png|/images/company-sequences/sequence3-123add2.png|/images/company-sequences/sequence4-123add2.png"],
                [ "url_image"=>"/images/company-sequences/sequence2-123add2.png",
                "themes"=>"ciencia en contexto","areas"=>"Ciencias de la vida","id"=>"10","name"=>"Entertainment","keywords"=>"corporation,recipes,magazine","url_slider_images"=>"/images/company-sequences/sequence1-123add2.png|/images/company-sequences/sequence2-123add2.png|/images/company-sequences/sequence3-123add2.png|/images/company-sequences/sequence4-123add2.png"],
                [ "url_image"=>"/images/company-sequences/sequence3-123add2.png","themes"=>"ciencia en contexto","areas"=>"Física","id"=>"11","name"=>"Other","keywords"=>"health,fitness,related,fitness","url_slider_images"=>"/images/company-sequences/sequence1-123add2.png|/images/company-sequences/sequence2-123add2.png|/images/company-sequences/sequence3-123add2.png|/images/company-sequences/sequence4-123add2.png"]
            ];

        foreach ($secuences as $secuence){
            $sequenceN = new CompanySequence();
            $sequenceN->name = $secuence['name'];
			$sequenceN->company_id = 1;
            $sequenceN->url_image = $secuence['url_image'];
            $sequenceN->keywords = $secuence['keywords'];
            $sequenceN->areas = $secuence['areas'];
            $sequenceN->description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae justo enim. Fusce tellus leo, fringilla ut facilisis at, ultricies a lectus. Ut iaculis facilisis tellus dignissim lacinia. In commodo vulputate mi non cursus. Nulla facilisi. Aenean feugiat, ex id faucibus fermentum, sem sem condimentum lectus, volutpat ullamcorper nulla diam ac mauris. Curabitur eget mauris ligula. Donec sagittis urna et neque rutrum, nec lacinia turpis tincidunt. Morbi sed leo eget felis aliquet mollis non at nunc. Etiam venenatis elementum maximus. Morbi tincidunt ante nec lectus maximus viverra ut consectetur nulla.';
            $sequenceN->duration = 5;
            $sequenceN->themes = $secuence['themes'];
            $sequenceN->url_slider_images = $secuence['url_slider_images'];
            $sequenceN->save();
        }
    }
}
