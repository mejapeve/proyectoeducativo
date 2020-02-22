<?php

use Illuminate\Database\Seeder;
use \App\Models\CompanyGroup;

class CompanyGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $companiesGroups = [
            ['company_id'=>1,'name'=>'grupo 1'],
            ['company_id'=>1,'name'=>'grupo 2'],
            ['company_id'=>1,'name'=>'grupo 3'],
        ];

        foreach ($companiesGroups as $group){
            $groupN = new CompanyGroup();
            $groupN->company_id = $group['company_id'];
            $groupN->name = $group['name'];
            $groupN->save();
        }

    }
}
