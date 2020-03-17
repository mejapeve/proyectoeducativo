<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperiencePartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experience_parts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('moment_experience_id')->unsigned();
            $table->foreign('moment_experience_id')->references('id')->on('moment_experiences');
            $table->string('tittle');
            $table->string('description');
            $table->longText('frontend');
            $table->bigInteger('kit_id')->unsigned()->nullable();
            $table->foreign('kit_id')->references('id')->on('kits');
            $table->longText('basic_materials');
            $table->bigInteger('duration');
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
        Schema::dropIfExists('experience_parts');
    }
}
