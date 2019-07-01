<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoftwareTacheItTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('software_tache_it', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_software');
            $table->unsignedBigInteger('id_tache_it');

            $table->foreign('id_software')
                ->references('id_software')
                ->on('software');
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
        Schema::dropIfExists('software_tache_it');
    }
}
