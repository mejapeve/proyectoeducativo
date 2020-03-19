<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSequenceQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sequence_questions_table', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('company_sequence_id')->unsigned();
            $table->foreign('company_sequence_id')->references('id')->on('company_sequences');
            $table->bigInteger('sequence_moment_id')->unsigned()->nullable();
            $table->foreign('sequence_moment_id')->references('id')->on('sequence_moments');
            $table->bigInteger('part_moment_id')->nullable();
            $table->bigInteger('moment_experience_id')->unsigned()->nullable();
            $table->bigInteger('part_experience_id')->nullable();
            $table->longText('description');
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
        Schema::dropIfExists('sequence_questions_table');
    }
}
