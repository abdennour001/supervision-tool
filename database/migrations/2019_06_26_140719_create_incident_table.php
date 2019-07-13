<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncidentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incident', function (Blueprint $table) {
            $table->bigIncrements('id_incident');
            $table->mediumText('descriptif_incident');
            $table->dateTime('date_incident');
            $table->tinyInteger('etat_incident');
            $table->tinyInteger('severite');
            $table->unsignedBigInteger('id_software_cause')->nullable();
            $table->unsignedBigInteger('id_hardware_cause')->nullable();

            $table->foreign('id_software_cause')->references('id_software')->on('software');
            $table->foreign('id_hardware_cause')->references('id_hardware')->on('hardware');
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
        Schema::dropIfExists('incident');
    }
}
