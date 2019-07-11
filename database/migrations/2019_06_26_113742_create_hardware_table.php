<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHardwareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hardware', function (Blueprint $table) {
            $table->bigIncrements('id_hardware');
            $table->string('hostname')->nullable();
            $table->ipAddress('snmpaddr');
            $table->mediumText('snmp_sysdescr')->nullable();
            $table->string('etat_hardware')->nullable();
            $table->unsignedBigInteger('id_marque_hardware')->nullable();

            $table->foreign('id_marque_hardware')->references('id_marque_hardware')
                ->on('marque_hardware');
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
        Schema::dropIfExists('hardware');
    }
}
