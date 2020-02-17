<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAffiliatedCompanyRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliated_company_roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('affiliated_company_id')->unsigned();
            $table->foreign('affiliated_company_id')->references('id')->on('afiliado_empresas');
            $table->bigInteger('rol_id')->unsigned();
            $table->foreign('rol_id')->references('id')->on('roles');
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
        Schema::dropIfExists('affiliated_company_roles');
    }
}
