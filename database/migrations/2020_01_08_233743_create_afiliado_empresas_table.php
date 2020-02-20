<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAfiliadoEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('afiliado_empresas', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('user_name')->nullable();
            $table->string('name');
            $table->string('last_name');
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('provaider_facebook')->nullable();
            $table->string('provaider_google')->nullable();
            $table->bigInteger('country_id')->nullable()->unsigned();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->bigInteger('department_id')->nullable()->unsigned();
            $table->foreign('department_id')->references('id')->on('departments');
            $table->bigInteger('city_id')->nullable()->unsigned();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->string('date_birth')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('afiliado_empresas');
    }
}
