<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTacheItTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tache_it', function (Blueprint $table) {
            $table->bigIncrements('id_tache');
            $table->date('date_affectation_tache');
            $table->date('date_debut_tache');
            $table->date('date_fin_tache');
            $table->unsignedBigInteger('duree');
            $table->tinyInteger('etat');
            $table->unsignedBigInteger('id_etape');
            $table->unsignedBigInteger('id_ingenieur');
            $table->unsignedBigInteger('id_type_tache');

            $table->foreign('id_etape')->references('id_etape')->on('etape');
            $table->index('id_ingenieur');
            $table->foreign('id_type_tache')->references('id_type_tache')->on('type_tache');
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
        Schema::dropIfExists('tache_it');
    }
}
