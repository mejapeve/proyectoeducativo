<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperiencePartQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experience_part_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('experience_part_id')->unsigned();
            $table->foreign('experience_part_id')->references('id')->on('experience_parts');
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
        Schema::dropIfExists('experience_part_questions');
    }
}
