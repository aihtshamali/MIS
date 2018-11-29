<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantripRequestedcitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantrip_requestedcities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('plantrip_triprequest_id')->unsigned()->index()->nullable();
            $table->foreign('plantrip_triprequest_id')->references('id')->on('plantrip_triprequests')->onDelete('cascade');
           
            $table->integer('requestedCity_id')->unsigned()->index()->nullable();
            $table->foreign('requestedCity_id')->references('id')->on('plantrip_cities')->onDelete('no action');  
            
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
        Schema::dropIfExists('plantrip_requested_cities');
    }
}
