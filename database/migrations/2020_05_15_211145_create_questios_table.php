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
            $table->string('title');
            $table->longText('options');
            $table->longText('review');
            $table->bigInteger('type_answer')->unsigned();
            $table->foreign('type_answer')->references('id')->on('type_answers');
            $table->bigInteger('sequence_id')->unsigned()->nullable();
            $table->bigInteger('moment_id')->unsigned()->nullable();
            $table->bigInteger('experience_id')->unsigned()->nullable();
            $table->bigInteger('order')->unsigned();
            $table->longText('objective');
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
