<?php

use Illuminate\Database\Seeder;
use App\Models\PaymentStatus;

class PaymentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $types =
            [
                ["name"=>'pendiente de pago'],
                ["name"=>'inicio de transacción'],
                ["name"=>'exitosa'],
                ["name"=>'rechazada'],
                ["name"=>'cancelada'],

            ];
        foreach ($types as $type){
            $typeN = new PaymentStatus();
            $typeN->name = $type['name'];
            $typeN->save();
        }
    }
}
