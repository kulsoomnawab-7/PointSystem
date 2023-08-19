<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsermodelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usermodels', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->string("email");
            $table->string("password");
            $table->integer("role")->default(0);

            $table->string("std_id");
            $table->foreign("std_id")->on("id")->references("students");

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
        Schema::dropIfExists('usermodels');
    }
}
