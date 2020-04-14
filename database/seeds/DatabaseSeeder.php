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
        $this->call(KitTableSeeder::class);
        $this->call(ElementSeeder::class);
        $this->call(CompanySequencesSeeder::class);

        $this->call(TypesRatigPlanSeeder::class);
        $this->call(RatingPlanSeeder::class);
        $this->call(PaymentStatusSeeder::class);
        $this->call(ShoppingCarSeeder::class);
        $this->call(ConnectionStructContentSeeder::class);
        //$this->call(AffiliatedAccountServicesSeeder::class);

    }
}
