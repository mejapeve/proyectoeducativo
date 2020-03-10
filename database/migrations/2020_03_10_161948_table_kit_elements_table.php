<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableKitElementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kit_elements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('kit_id')->unsigned();
            $table->foreign('kit_id')->references('id')->on('kits');
            $table->bigInteger('element_id')->unsigned();
            $table->foreign('element_id')->references('id')->on('elements');
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
        Schema::dropIfExists('kit_elements');
    }
}
