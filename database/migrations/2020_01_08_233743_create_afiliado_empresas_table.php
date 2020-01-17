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
            /*
            $table->bigIncrements('id');
            //$table->string('employee_id')->unique();
            $table->string('employee_password');
            $table->rememberToken();
            $table->timestamps();*/

            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('correo')->unique();
            $table->string('password');
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
