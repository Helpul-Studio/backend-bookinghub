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
        Schema::create('snap_midtrans', function (Blueprint $table) {
            $table->bigIncrements('id_snap_midtrans');
            $table->unsignedBigInteger('id_booking');
            $table->foreign('id_booking')->references('id_booking')->on('bookings');
            $table->string('snap_token');
            $table->string('redirect_url');
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
        Schema::dropIfExists('snap_midtrans');
    }
};
