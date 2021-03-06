<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAffiliatedAccountServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliated_account_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('company_affiliated_id')->unsigned()->nullable();
            $table->foreign('company_affiliated_id')->references('id')->on('afiliado_empresas');
            $table->bigInteger('rating_plan_id')->unsigned()->nullable();
            $table->foreign('rating_plan_id')->references('id')->on('rating_plans');
			$table->bigInteger('rating_plan_type')->unsigned()->nullable();
			$table->foreign('rating_plan_type')->references('id')->on('types_rating_plans');
			$table->bigInteger('shopping_cart_id')->unsigned()->	nullable();
			$table->foreign('shopping_cart_id')->references('id')->on('shopping_carts');
            $table->date('init_date');
            $table->date('end_date');
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
        Schema::dropIfExists('affiliated_account_services');
    }
}
