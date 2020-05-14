<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConexionesAffiliatedAssignmentUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('connection_affiliated_students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('student_company_id')->unsigned();
            $table->foreign('student_company_id')->references('id')->on('affiliated_company_roles');
            $table->bigInteger('tutor_company_id')->unsigned();
            $table->foreign('tutor_company_id')->references('id')->on('affiliated_company_roles');
            $table->string('age_stage');

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
        Schema::dropIfExists('connection_affiliated_students');
    }
}
