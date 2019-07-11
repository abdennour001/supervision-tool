<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarqueHardwareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marque_hardware', function (Blueprint $table) {
            $table->bigIncrements('id_marque_hardware');
            $table->string('reference');
            $table->string('constructeur');
            $table->string('url_img')->nullable();
            $table->unsignedBigInteger('id_type_hardware');

            $table->foreign('id_type_hardware')->references('id_type_hardware')->on('type_hardware');
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
        Schema::dropIfExists('marque_hardware');
    }
}
