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
            $table->longText('description')->nullable();
            $table->string('url_image')->nullable();
            $table->longText('url_slider_images')->nullable();
            $table->string('url_vimeo')->nullable();
            $table->longText('keywords')->nullable();
            $table->longText('areas')->nullable();
            $table->longText('themes')->nullable();
            $table->longText('objectives')->nullable();
            $table->longText('section_1')->nullable();
            $table->longText('section_2')->nullable();
            $table->longText('section_3')->nullable();
            $table->longText('section_4')->nullable();
            $table->date('init_date')->nullable();
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
