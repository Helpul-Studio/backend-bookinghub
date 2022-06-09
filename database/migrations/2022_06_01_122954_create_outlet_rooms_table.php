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
        Schema::create('outlet_rooms', function (Blueprint $table) {
            $table->bigIncrements('id_outlet_room');
            $table->unsignedBigInteger('id_outlet');
            $table->foreign('id_outlet')->references('id_outlet')->on('outlets');
            $table->integer('outlet_room_number');
            $table->string('outlet_room_name');
            $table->enum('outlet_room_status', ['available','booked']);
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
        Schema::dropIfExists('outlet_rooms');
    }
};
