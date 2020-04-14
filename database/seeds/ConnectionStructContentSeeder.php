<?php

use Illuminate\Database\Seeder;
use App\Models\ConnectionStructContent;

class ConnectionStructContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //

        $data =
            [
                ["description"=>'punto de encuentro',"type_id"=>1],
                ["description"=>'situación generadora',"type_id"=>1],
                ["description"=>'ruta de viaje',"type_id"=>1],
                ["description"=>'guia de saberes',"type_id"=>1],
                ["description"=>'pregunta central',"type_id"=>2],
                ["description"=>'ciencia cotidiana',"type_id"=>2],
                ["description"=>'mas conexiones',"type_id"=>2],
                ["description"=>'experiencia',"type_id"=>3],

            ];
        foreach ($data as $information){
            $connectionStructContent = new ConnectionStructContent();
            $connectionStructContent->description = $information['description'];
            $connectionStructContent->type_id = $information['type_id'];
            $connectionStructContent->save();
        }

    }
}
