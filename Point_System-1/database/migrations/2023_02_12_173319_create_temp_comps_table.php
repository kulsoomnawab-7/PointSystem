<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempCompsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_comps', function (Blueprint $table) {
            $table->id();
            $table->string("Host_Name")->nullable();
            $table->string("email")->nullable();
            $table->string('hardware_name')->nullable();
            $table->string('other_hardware_issue')->nullable();
            $table->string('software_name')->nullable();
            $table->string('other_software_issue')->nullable();
            $table->string('other_Network_issue')->nullable();
            $table->string('Network_issue')->nullable();
            $table->string('other_issue')->nullable();
            $table->string('status')->nullable();
            $table->date("date_of_complain")->format('dd/mm/yy')->nullable(); 


            $table->integer("Lab_id")->nullable();
            // $table->foreign("Lab_id")->on("id")->references("labs");
            $table->integer("Pc_ip")->nullable();
            $table->foreign("Pc_ip")->on("id")->references("lab_systems");
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
        Schema::dropIfExists('temp_comps');
    }
}
