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
            $table->bigInteger('company_affiliated_id')->unsigned();
            $table->foreign('company_affiliated_id')->references('id')->on('afiliado_empresas');
            $table->bigInteger('rating_plan_id')->unsigned();
            $table->foreign('rating_plan_id')->references('id')->on('rating_plans');
            $table->date('init_date');
            $table->date('end_date');
            $table->bigInteger('payment_status')->unsigned();
            $table->date('payment_init_date');
            $table->date('payment_end_date');
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
