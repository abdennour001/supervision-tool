<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrancheTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tranche', function (Blueprint $table) {
            $table->bigIncrements('id_tranche');
            $table->date('date_debut_tranche');
            $table->date('date_fin_tranche');
            $table->unsignedBigInteger('id_tache');

            $table->foreign('id_tache')->references('id_tache')->on('tache_it');
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
        Schema::dropIfExists('tranche');
    }
}
