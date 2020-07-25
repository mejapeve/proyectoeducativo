<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('affiliated_account_service_id')->unsigned()->nullable();
            $table->foreign('affiliated_account_service_id')->references('id')->on('affiliated_account_services');
            $table->bigInteger('sequence_id')->unsigned();
            $table->foreign('sequence_id')->references('id')->on('company_sequences');
            $table->bigInteger('moment_id')->unsigned();
            $table->foreign('moment_id')->references('id')->on('sequence_moments');
            $table->bigInteger('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->bigInteger('student_id')->unsigned()->comment('este id hace referenci a la tabla afiliado_empresas');
            $table->foreign('student_id')->references('id')->on('afiliado_empresas');
            $table->bigInteger('weighted');
            $table->char('letter');
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
        Schema::dropIfExists('ratings');
    }
}
