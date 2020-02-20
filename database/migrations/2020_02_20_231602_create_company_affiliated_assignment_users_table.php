<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyAffiliatedAssignmentUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_affiliated_assigment_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('company_affiliated_id');
            $table->integer('affiliated_id');
            $table->integer('guide_id')->nullable();
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
        Schema::dropIfExists('company_affiliated_assigment_users');
    }
}
