<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMomentKitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moment_kits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('kit_id')->unsigned()->nullable();
            $table->foreign('kit_id')->references('id')->on('kits');
            $table->bigInteger('element_id')->unsigned()->nullable();
            $table->foreign('element_id')->references('id')->on('elements');
            $table->bigInteger('sequence_moment_id')->unsigned()->nullable();
            $table->foreign('sequence_moment_id')->references('id')->on('sequence_moments');
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
        Schema::dropIfExists('moment_kits');
    }
}
