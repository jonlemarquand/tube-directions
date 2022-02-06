<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLineStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('line_stations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('line_id');
            $table->unsignedBigInteger('station_id');
            $table->unsignedBigInteger('line_position');
            $table->foreign('line_id')->references('id')->on('lines');
            $table->foreign('station_id')->references('id')->on('stations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('line_stations');
    }
}
