<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoutiqueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boutique', function (Blueprint $table) {
            $table->bigIncrements('id_boutique');
            $table->string('nom_boutique');
            $table->mediumText('address_boutique');
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
        Schema::dropIfExists('boutique');
    }
}
