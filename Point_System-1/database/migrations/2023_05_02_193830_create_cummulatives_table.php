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
        Schema::create('cummulative', function (Blueprint $table) {
            $table->id();
            $table->string('batch')->nullable();
            $table->string('month')->nullable();
            $table->integer('year')->nullable();
            $table->float('punctuality')->nullable();
            $table->float('course_coverage')->nullable();
            $table->float('technical_support')->nullable();
            $table->float('clearing_doubt')->nullable();
            $table->float('exam_assignment')->nullable();
            $table->float('book_utilization')->nullable();

            $table->float('student_appraisal')->nullable();
            $table->float('computer_uptime')->nullable();
            $table->float('gpa')->nullable();
            $table->string('faculty_name')->nullable();
            $table->integer('total_feedback_std')->nullable();
            $table->string('percent')->nullable();

            // $table->string('date')->nullable();
            $table->date("date")->format('dd/mm/yy')->nullable();

            $table->integer('total_student')->nullable();




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
        Schema::dropIfExists('cummulative');
    }
};
