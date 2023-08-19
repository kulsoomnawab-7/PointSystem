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
        Schema::create('faculty_feedback_gpas', function (Blueprint $table) {
            $table->id();
            $table->integer("faculty_id");
            $table->string("month");
            $table->string("batch");
            $table->integer("year");
            $table->integer("gpa");
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
        Schema::dropIfExists('faculty_feedback_gpas');
    }
};
