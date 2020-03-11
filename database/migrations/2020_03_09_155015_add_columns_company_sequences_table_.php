<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsCompanySequencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_sequences', function (Blueprint $table) {
            //
            $table->string('url_image');
            $table->integer('type');
            $table->longText('keywords');
            $table->longText('areas');
            $table->longText('description');
            $table->bigInteger('duration');
            $table->longText('themes');
            $table->dateTime('expiration_date')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_sequences', function (Blueprint $table) {
            //
        });
    }
}
