<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebcareercoursemodelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webcareercoursemodels', function (Blueprint $table) {
            $table->id();
            $table->text("image");
            $table->text("semester");
            $table->text("coursename");
            $table->text("endprofile");
            $table->text("description");
            $table->string("completition");
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
        Schema::dropIfExists('webcareercoursemodels');
    }
}
