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
        Schema::create('outlets', function (Blueprint $table) {
            $table->bigIncrements('id_outlet');
            $table->string('outlet_name');
            // $table->string('outlet_location_latitude');
            // $table->string('outlet_location_longitude');
            $table->time('opening_hours');
            $table->time('closing_hours');
            $table->string('outlet_phone');
            $table->string('instagram_link');
            $table->bigInteger('price_outlet_per_hour');
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
        Schema::dropIfExists('outlets');
    }
};
