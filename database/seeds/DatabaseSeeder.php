<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(RoleTableSeeder::class);
        $this->call(DefaultCompanySeeder::class);
        $this->call(DefaultUsersSeeder::class);
        $this->call(CountriesSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(CompanyGroupsSeeder::class);
        $this->call(CompanySequencesSeeder::class);
        $this->call(KitTableSeeder::class);


    }
}
