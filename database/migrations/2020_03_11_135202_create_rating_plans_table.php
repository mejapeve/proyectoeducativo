<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating_plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('description');
            $table->string('image_url');
            $table->bigInteger('price');
            $table->boolean('is_free');
            $table->bigInteger('type_rating_plan_id')->unsigned();
            $table->foreign('type_rating_plan_id')->references('id')->on('types_rating_plans');
            $table->integer('count');
            $table->integer('days');
            $table->bigInteger('sequence_free_id')->nullable();
            $table->string('moment_free_ids')->nullable();
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
        Schema::dropIfExists('rating_plans');
    }
}
