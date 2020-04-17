<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAffiliatedContentAccountServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliated_content_account_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('affiliated_account_service_id');
            $table->bigInteger('type_product_id');
            $table->bigInteger('secuence_id');
            $table->bigInteger('moment_id')->nullable();
            $table->date('init_date');
            $table->date('end_date');
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
        Schema::dropIfExists('affiliated_content_account_services');
    }
}
