<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoppingCartsTable extends Migration
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
            $table->bigInteger('type_product_id')->unsigned()->nullable();
            $table->bigInteger('payment_status_id')->unsigned()->nullable();
            $table->foreign('payment_status_id')->references('id')->on('payment_status');
            $table->longText('payment_transaction_id')->nullable();
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
