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
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id_booking');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id_user')->on('users');
            $table->unsignedBigInteger('id_outlet');
            $table->foreign('id_outlet')->references('id_outlet')->on('outlets');
            $table->unsignedBigInteger('id_outlet_room');
            $table->foreign('id_outlet_room')->references('id_outlet_room')->on('outlet_rooms');
            $table->bigInteger('total_payment');
            $table->enum('status', ['pending', 'reject', 'accepted']);
            $table->string('booking_code');
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
        Schema::dropIfExists('bookings');
    }
};
