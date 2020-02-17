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
            ['name'=>'conexiones']
        ];

        foreach ($companies as $company){
            $companyN = new Companies();
            $companyN->name = $company['name'];
            $companyN->save();
        }

    }
}
