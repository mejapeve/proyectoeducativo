<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToSequenceMoments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sequence_moments', function (Blueprint $table) {
            //
            $table->longText('performances')->nullable()->after('objectives');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sequence_moments', function (Blueprint $table) {
            //
        });
    }
}
