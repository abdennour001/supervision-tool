<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterfaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interface', function (Blueprint $table) {
            $table->bigIncrements('id_interface');
            $table->string('nom_interface');
            $table->string('alias_interface');
            $table->ipAddress('ip_address');
            $table->string('ip_subnet_mask');
            $table->macAddress('mac_address');
            $table->string('etat_interface');
            $table->unsignedBigInteger('id_hardware');

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
        Schema::dropIfExists('interface');
    }
}
