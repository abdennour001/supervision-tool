<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtapeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etape', function (Blueprint $table) {
            $table->bigIncrements('id_etape');
            $table->string('nom_etape');
            $table->date('date_debut_etape');
            $table->date('date_echeance_etape');
            $table->smallInteger('priorite');
            $table->boolean('livree');
            $table->unsignedBigInteger('id_projet');

            $table->foreign('id_projet')->references('id_projet')
                ->on('projet_it');
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
        Schema::dropIfExists('etape');
    }
}
