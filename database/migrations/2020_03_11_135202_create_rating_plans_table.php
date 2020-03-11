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
            $table->bigInteger('sequences_included')->nullable();
            $table->bigInteger('moments_included')->nullable();
            $table->bigInteger('experiences_included')->nullable();
            $table->string('sequence_company_ids')->nullable();
            $table->string('sequence_moment_ids')->nullable();
            $table->string('sequence_experience_ids')->nullable();
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
