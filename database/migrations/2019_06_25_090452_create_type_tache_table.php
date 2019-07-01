<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeTacheTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_tache', function (Blueprint $table) {
            $table->bigIncrements('id_type_tache');
            $table->string('libelle_type_tache');
            $table->tinyInteger('seuil');
            $table->unsignedBigInteger('id_famille_type_tache');

            $table->foreign('id_famille_type_tache')->references('id_famille_type_tache')->on('famille_type_tache');
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
        Schema::dropIfExists('type_tache');
    }
}
