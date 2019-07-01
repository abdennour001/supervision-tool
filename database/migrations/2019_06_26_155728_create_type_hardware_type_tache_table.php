<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeHardwareTypeTacheTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_hardware_type_tache', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_type_hardware');
            $table->unsignedBigInteger('id_type_tache');
            $table->timestamps();

            $table->foreign('id_type_hardware')->references('id_type_hardware')->on('type_hardware');
            $table->foreign('id_type_tache')->references('id_type_tache')->on('type_tache');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_hardware_type_tache');
    }
}
