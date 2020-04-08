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
            $table->date('init_date')->nullable();
            $table->date('end_date')->nullable();
            $table->bigInteger('payment_status')->unsigned()->nullable();
            $table->date('payment_init_date')->nullable();
            $table->date('payment_end_date')->nullable();
            $table->integer('rating_plan_type')->nullable();
            $table->string('sequence_ids')->nullable();
            $table->string('moment_ids')->nullable();
            $table->string('experience_ids')->nullable();
            $table->string('company_sequence_id')->nullable();
            $table->string('company_moment_id')->nullable();
            $table->bigInteger('type_product_id')->unsigned()->nullable();
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
