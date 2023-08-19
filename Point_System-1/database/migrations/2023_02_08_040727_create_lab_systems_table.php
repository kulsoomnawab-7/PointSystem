<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_systems', function (Blueprint $table) {
            $table->id();
            $table->string("Host_Name");
            $table->integer("Status")->default(0);
            $table->integer("Lab_id");
            $table->foreign("Lab_id")->on("id")->references("labs");
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
        Schema::dropIfExists('lab_systems');
    }
}
