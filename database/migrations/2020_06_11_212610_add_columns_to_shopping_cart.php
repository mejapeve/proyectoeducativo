<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToShoppingCart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shopping_carts', function (Blueprint $table) {
            //
            $table->string('approval_code',15);
            $table->string('payment_method',3)->comment('valor para registrar el método de pago:PSE:Tarjeta débito,TC:Tarjeta crédito');
        });

        Schema::table('questions', function (Blueprint $table) {
            //
            $table->string('url_image')->nullable();
            $table->string('url_video')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shopping_carts', function (Blueprint $table) {
            //
        });
    }
}
