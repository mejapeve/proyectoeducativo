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
            $table->longText('title')->nullable();
            $table->longText('options');
            $table->longText('review');
            $table->bigInteger('type_answer')->unsigned()->comment('1:Pregunta sin respuesta,2:Cerrada,3:Pregunta docente');
            $table->bigInteger('sequence_id')->unsigned()->nullable();
            $table->bigInteger('moment_id')->unsigned()->nullable();
            $table->bigInteger('experience_id')->unsigned()->nullable();
            $table->bigInteger('order')->unsigned();
            $table->longText('objective')->nullable();
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
