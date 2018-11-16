<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('trip_request_id')->unsigned()->nullable();
            $table->foreign('trip_request_id')->references('id')->on('trip_requests')->onDelete('noaction');
            
            $table->integer('From_Location')->unsigned()->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('noaction');

            $table->integer('To_Location')->unsigned()->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('noaction');

            $table->boolean('status');

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
        Schema::dropIfExists('trip_locations');
    }
}
