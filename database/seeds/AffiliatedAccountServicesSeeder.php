<?php

use Illuminate\Database\Seeder;
use App\Models\AffiliatedAccountService;

class AffiliatedAccountServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $affiliatedAccountServices =
            [
                [
                    "company_affiliated_id"=>1,
                    "rating_plan_id"=>1,
                    "init_date" => '2020-03-24',
                    "end_date" => '2020-05-24',
                    "payment_status" => 1,
                    "payment_init_date" => '2020-03-24',
                    "payment_end_date" => '2020-03-24',
                ],
                [
                    "company_affiliated_id"=>1,
                    "rating_plan_id"=>2,
                    "init_date" => '2020-03-24',
                    "end_date" => '2020-05-24',
                    "payment_status" => 2,
                    "payment_init_date" => '2020-03-24',
                    "payment_end_date" => '2020-03-24',
                ],
                [
                    "company_affiliated_id"=>1,
                    "rating_plan_id"=>3,
                    "init_date" => '2020-03-24',
                    "end_date" => '2020-05-24',
                    "payment_status" => 3,
                    "payment_init_date" => '2020-03-24',
                    "payment_end_date" => '2020-03-24',
                ],
            ];
        foreach ($affiliatedAccountServices as $affiliatedAccountService){
            $affiliatedAccountServiceN = new AffiliatedAccountService();
            $affiliatedAccountServiceN->company_affiliated_id = $affiliatedAccountService['company_affiliated_id'];
            $affiliatedAccountServiceN->rating_plan_id = $affiliatedAccountService['rating_plan_id'];
            $affiliatedAccountServiceN->init_date = $affiliatedAccountService['init_date'];
            $affiliatedAccountServiceN->end_date = $affiliatedAccountService['end_date'];
            $affiliatedAccountServiceN->payment_status = $affiliatedAccountService['payment_status'];
            $affiliatedAccountServiceN->payment_init_date = $affiliatedAccountService['payment_init_date'];
            $affiliatedAccountServiceN->payment_end_date = $affiliatedAccountService['payment_end_date'];
            $affiliatedAccountServiceN->save();
        }
    }
}
