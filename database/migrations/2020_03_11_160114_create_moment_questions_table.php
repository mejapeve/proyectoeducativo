<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMomentQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moment_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('sequence_moment_id')->unsigned();
            $table->foreign('sequence_moment_id')->references('id')->on('sequence_moments');
            $table->string('description')->nullable();
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
        Schema::dropIfExists('moment_questions');
    }
}
