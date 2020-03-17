<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableSequenceMomentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sequence_moments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('sequence_company_id')->unsigned();
            $table->foreign('sequence_company_id')->references('id')->on('company_sequences');
            $table->bigInteger('order');
            $table->string('name');
            $table->string('description');
            $table->longText('objetives');
            $table->longText('frontend');
            $table->bigInteger('lab_equipment_id');
            $table->longText('basic_materials');
            $table->bigInteger('duration');
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
        Schema::dropIfExists('sequence_moments');
    }
}
