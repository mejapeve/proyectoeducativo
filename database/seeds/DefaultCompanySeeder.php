<?php


use Illuminate\Database\Seeder;
use \App\Models\Companies;

class DefaultCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $companies = [
            ['name'=>'conexiones','nick_name'=>'conexiones','url_icon'=>''],
			['name'=>'Ecopetrol S.A.S','nick_name'=>'ecopetrol','url_icon'=>'https://id.presidencia.gov.co/Galeria_Fotografica/181108_notaEcopetrol_1800.jpg']
        ];

        foreach ($companies as $company){
            $companyN = new Companies();
            $companyN->name = $company['name'];
			$companyN->nick_name = $company['nick_name'];
			$companyN->url_icon = $company['url_icon'];
            $companyN->save();
        }

    }
}

