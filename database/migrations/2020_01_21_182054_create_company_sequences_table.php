<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanySequencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_sequences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->string('name');
            $table->longText('description');
            $table->string('url_image');
            $table->string('url_slider_images');
            $table->longText('keywords');
            $table->longText('areas');
            $table->longText('themes');
            $table->longText('objetives');
            $table->longText('section_1')->nullable();
            $table->longText('section_2')->nullable();
            $table->longText('section_3')->nullable();
            $table->longText('section_4')->nullable();
            $table->date('init_date');
            $table->date('expiration_date')->nullable();

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
        Schema::dropIfExists('company_sequences');
    }
}
