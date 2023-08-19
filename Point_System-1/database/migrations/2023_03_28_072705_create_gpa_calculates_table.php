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
        Schema::create('gpa_calculates', function (Blueprint $table) {
            $table->id();
            $table->string("batch")->nullable();
            $table->string("month")->nullable();
            $table->string("question")->nullable();
            $table->integer("year")->nullable();
            $table->integer("column_i")->nullable();
            $table->integer("column_ii")->nullable();
            $table->integer("column_iii")->nullable();
            $table->integer("column_iv")->nullable();
            $table->integer("sum")->nullable();
            $table->integer("average")->nullable();
            $table->integer("gpa")->nullable();

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
        Schema::dropIfExists('gpa_calculates');
    }
};
