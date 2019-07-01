<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHardwareTacheItTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hardware_tache_it', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_hardware');
            $table->unsignedBigInteger('id_tache_it');

            $table->foreign('id_hardware')
                ->references('id_hardware')
                ->on('hardware');
            $table->foreign('id_tache_it')
                ->references('id_tache_it')
                ->on('tache_it');
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
        Schema::dropIfExists('hardware_tache_it');
    }
}
