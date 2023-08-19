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
        Schema::create('jobs_models', function (Blueprint $table) {
            $table->id();
            $table->string("gender");
            $table->string("JobClosingDate");
            $table->string("JobDescription");
            $table->string("JobLocation");
            $table->string("JobNature");
            $table->string("JobPostDate");
            $table->string("JobTitle");
            $table->string("Status");
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
        Schema::dropIfExists('jobs_models');
    }
};
