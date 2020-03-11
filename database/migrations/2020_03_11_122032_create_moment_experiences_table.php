<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMomentExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moment_experiences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('sequence_moment_id')->unsigned();
            $table->foreign('sequence_moment_id')->references('id')->on('sequence_moments');
            $table->string('tittle');
            $table->string('decription');
            $table->json('objetives');
            $table->json('fronted');
            $table->bigInteger('kit_id')->nullable()->unsigned();
            $table->foreign('kit_id')->references('id')->on('kits');
            $table->string('basic_materials');
            $table->integer('duration');
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
        Schema::dropIfExists('moment_experiences');
    }
}
