<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeSoftwareTypeTacheTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_software_type_tache', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_type_software');
            $table->unsignedBigInteger('id_type_tache');

            $table->foreign('id_type_software')
                ->references('id_type_software')
                ->on('type_software');
            $table->foreign('id_type_tache')
                ->references('id_type_tache')
                ->on('type_tache');
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
        Schema::dropIfExists('type_software_type_tache');
    }
}
