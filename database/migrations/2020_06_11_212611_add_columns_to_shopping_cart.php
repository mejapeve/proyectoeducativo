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
            $table->string('approval_code',15)->nullable()->after('payment_process_date');
            $table->string('payment_method',3)->nullable()->after('approval_code')->comment('valor para registrar el método de pago:PSE:Tarjeta débito,TC:Tarjeta crédito');
        });

        Schema::table('questions', function (Blueprint $table) {
            //
            $table->string('url_image')->nullable()->after('concept');
            $table->string('url_video')->nullable()->after('url_image');
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
