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
            $table->bigInteger('student_company_id')->unsigned();
            $table->foreign('student_company_id')->references('id')->on('affiliated_company_roles');
            $table->bigInteger('teacher_company_id')->unsigned();
            $table->foreign('teacher_company_id')->references('id')->on('affiliated_company_roles');
            $table->bigInteger('company_sequence_id')->unsigned();
            $table->foreign('company_sequence_id')->references('id')->on('company_sequences');
            $table->bigInteger('company_group_id')->unsigned();
            $table->foreign('company_group_id')->references('id')->on('company_groups');
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
