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
            $table->longText('objetives');
            $table->longText('section_1')->nullable();
            $table->longText('section_2')->nullable();
            $table->longText('section_3')->nullable();

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
