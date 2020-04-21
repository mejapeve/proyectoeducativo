<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvancesLineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advance_lines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('affiliated_account_service_id')->unsigned();
            $table->foreign('affiliated_account_service_id')->references('id')->on('affiliated_account_services');
            $table->bigInteger('affiliated_company_id')->unsigned();
            $table->foreign('affiliated_company_id')->references('id')->on('afiliado_empresas');
            $table->bigInteger('sequence_id');
            $table->bigInteger('moment_id');
            $table->bigInteger('moment_section_id');
            // $table->bigInteger('struct_content_id')->unsigned();
           // $table->foreign('struct_content_id')->references('id')->on('connection_structures_contents');
           // $table->bigInteger('number_moment')->unsigned();
           // $table->bigInteger('part_experience')->unsigned();
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
        Schema::dropIfExists('advance_lines');
    }
}
