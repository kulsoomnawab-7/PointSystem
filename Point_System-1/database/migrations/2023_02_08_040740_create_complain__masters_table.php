<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplainMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complain__masters', function (Blueprint $table) {
            $table->id();
            $table->string("Complain_Category")->nullable();
            $table->string("Complain_Description")->nullable();
            $table->date("Date_of_Complain")->format('dd/mm/yy')->nullable();
            $table->string("Regiystered_By")->nullable(); //register by student and faculty
            $table->integer("Lab_id")->nullable();
            $table->foreign("Lab_id")->on("id")->references("labs");
            $table->integer("Pc_ip")->nullable();
            $table->foreign("Pc_ip")->on("id")->references("lab_systems");
            $table->integer("role_type")->nullable();
            $table->integer("Status")->default(0);
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
        Schema::dropIfExists('complain__masters');
    }
}
