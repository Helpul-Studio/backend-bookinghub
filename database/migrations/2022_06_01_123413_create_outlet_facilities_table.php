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
        Schema::create('outlet_facilities', function (Blueprint $table) {
            $table->bigIncrements('id_outlet_facility');
            $table->unsignedBigInteger('id_outlet');
            $table->foreign('id_outlet')->references('id_outlet')->on('outlets');
            $table->string('icon_outlet_facility');
            $table->string('description_outlet_facility');
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
        Schema::dropIfExists('outlet_facilities');
    }
};
