<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('student_affiliated_company_id')->unsigned()->comment('rol student');
            $table->foreign('student_affiliated_company_id')->references('id')->on('afiliado_empresas');
            $table->bigInteger('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->bigInteger('affiliated_account_service_id')->unsigned();
            $table->foreign('affiliated_account_service_id')->references('id')->on('affiliated_account_services');
            $table->bigInteger('question_id')->unsigned();
            $table->foreign('question_id')->references('id')->on('questions');
            $table->string('answer');
            $table->string('feedback')->nullable();
            $table->bigInteger('teacher_affiliated_company_id')->unsigned()->nullable()->comment('rol teacher');
            $table->foreign('teacher_affiliated_company_id')->references('id')->on('afiliado_empresas');
            $table->date('date_evaluation')->nullable();
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
        Schema::dropIfExists('answers');
    }
}
