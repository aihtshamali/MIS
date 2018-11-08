<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantripTriplocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantrip_triplocations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('plantrip_city_from')->unsigned()->index()->nullable();
            $table->foreign('plantrip_city_from')->references('id')->on('plantrip_cities')->onDelete('no action');
           
            $table->integer('plantrip_city_to')->unsigned()->index()->nullable();
            $table->foreign('plantrip_city_to')->references('id')->on('plantrip_cities')->onDelete('no action');
           
            $table->date('from_Date')->nullable();
            $table->date('to_Date')->nullable();
            $table->string('time_to_Departure')->nullable();
       
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
        Schema::dropIfExists('plantrip_triplocations');
    }
}
