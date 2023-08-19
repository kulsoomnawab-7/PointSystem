<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback_forms', function (Blueprint $table) {
            $table->id();
            $table->string("month")->nullable();
            $table->string("faculty")->nullable();
            $table->string("batch")->nullable();
            $table->string("subject")->nullable();
            $table->string("std_name_id")->nullable();
            $table->string("punctuality")->nullable();
            $table->string("course_coverage")->nullable();
            $table->string("course_coverage_r")->nullable();
            $table->string("technical_support")->nullable();
            $table->string("technical_support_r")->nullable();
            $table->string("clearing_doubt")->nullable();
            $table->string("clearing_doubt_r")->nullable();
            $table->string("exam_assignment")->nullable();
            $table->string("exam_assignment_r")->nullable();
            $table->string("book_utilization")->nullable();
            $table->string("book_utilization_r")->nullable();
            $table->string("student_appraisal")->nullable();
            $table->string("student_appraisal_r")->nullable();
            $table->string("computer_uptime")->nullable();
            $table->string("computer_uptime_r")->nullable();
            $table->string("remark")->nullable();
            $table->integer("year")->nullable();
            $table->date("date")->format('dd/mm/yy')->nullable(); 
            // $table->string("status")->nullable();

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
        Schema::dropIfExists('feedback_forms');
    }
};
