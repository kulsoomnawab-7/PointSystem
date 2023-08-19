<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebshortcoursemodelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webshortcoursemodels', function (Blueprint $table) {
            $table->id();
            $table->text("image");
            $table->text("coursename");
            $table->text("description");
            $table->text("courseduration");
            $table->text("classduration");
            $table->text("courseinfo");
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
        Schema::dropIfExists('webshortcoursemodels');
    }
}
