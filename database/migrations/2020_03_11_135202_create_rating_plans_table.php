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

            /*
            $table->boolean('sequences_included')->nullable();
            $table->boolean('moments_included')->nullable();
            $table->boolean('experiences_included')->nullable();
            $table->integer('sequence_company_count')->nullable();
            $table->integer('sequence_moment_count')->nullable();
            $table->integer('sequence_experience_count')->nullable();
            */
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
