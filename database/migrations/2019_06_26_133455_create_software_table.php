<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoftwareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('software', function (Blueprint $table) {
            $table->bigIncrements('id_software');
            $table->string('nom_software');
            $table->unsignedBigInteger('id_type_software');
            $table->unsignedBigInteger('id_hardware');

            $table->foreign('id_type_software')->references('id_type_software')->on('type_software');
            $table->foreign('id_hardware')->references('id_hardware')->on('hardware');
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
        Schema::dropIfExists('software');
    }
}
