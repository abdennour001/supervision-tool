<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification', function (Blueprint $table) {
            $table->bigIncrements('id_notification');
            $table->date('date_notification');
            $table->string('objet');
            $table->mediumText('contenu');
            $table->unsignedSmallInteger('urgence');
            $table->unsignedBigInteger('id_profil');

            $table->foreign('id_profil')->references('id_profil')->on('profil');
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
        Schema::dropIfExists('notification');
    }
}
