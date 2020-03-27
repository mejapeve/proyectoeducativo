<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopingCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_carts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('company_affiliated_id')->unsigned()->nullable();
            $table->foreign('company_affiliated_id')->references('id')->on('afiliado_empresas');
            $table->longText('session_id')->nullable();
            $table->bigInteger('rating_plan_id')->unsigned()->nullable();
            $table->foreign('rating_plan_id')->references('id')->on('rating_plans');
            $table->bigInteger('kit_id')->unsigned()->nullable();
            $table->foreign('kit_id')->references('id')->on('kits');
            $table->bigInteger('payment_status')->unsigned()->nullable();
            $table->bigInteger('payment_transaction_id')->unsigned()->nullable();
            $table->date('payment_init_date')->nullable();
            $table->bigInteger('shipping_price')->unsigned()->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shopping_carts');
    }
}
