<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantripDriverRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantrip_driver_ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('plantrip_triprequest_id')->unsigned()->index()->nullable();
            $table->foreign('plantrip_triprequest_id')->references('id')->on('plantrip_triprequests')->onDelete('cascade');
            $table->integer('vmis_driver_id')->unsigned()->index()->nullable();
            $table->foreign('vmis_driver_id')->references('id')->on('vmis_drivers')->onDelete('cascade');
            $table->integer('rating')->nullable();
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
        Schema::dropIfExists('plantrip__driver_ratings');
    }
}
