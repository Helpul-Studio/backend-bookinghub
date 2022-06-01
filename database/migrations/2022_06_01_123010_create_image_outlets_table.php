<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_outlets', function (Blueprint $table) {
            $table->bigIncrements('id_image_outlet');
            $table->unsignedBigInteger('id_outlet');
            $table->foreign('id_outlet')->references('id_outlet')->on('outlets');
            $table->string('photo_outlet');
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
        Schema::dropIfExists('image_outlets');
    }
};
