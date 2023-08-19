<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempVerfiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_verfies', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->string('code')->nullable();
            // $table->integer('password')->nullable();
            $table->integer("status")->nullable();
            // $table->date("date_of_complain")->format('dd/mm/yy')->nullable(); 
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
        Schema::dropIfExists('temp_verfies');
    }
}
