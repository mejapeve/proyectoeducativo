<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tittle');
            $table->longText('options');
            $table->longText('review');
            $table->bigInteger('type_answer')->unsigned();
            $table->foreign('type_answer')->references('id')->on('type_answers');
            $table->integer('sequence_id');
            $table->integer('moment_id');
            $table->integer('experience_id');
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
        Schema::dropIfExists('questions');
    }
}
