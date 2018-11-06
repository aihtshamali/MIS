<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantripAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantrip_assignments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('plantrip_request_id')->unsigned()->index()->nullable();
            $table->foreign('plantrip_trip_member_id')->references('id')->on('plantrip_requests')->onDelete('cascade');
            $table->integer('vehicle_id')->unsigned()->index()->nullable();
            $table->foreign('vehicle_id')->references('id')->on('vmis_vehicles')->onDelete('cascade');
            $table->integer('driver_id')->unsigned()->index()->nullable();
            $table->foreign('driver_id')->references('id')->on('vmis_drivers')->onDelete('cascade');
            
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
          
            $table->string('comment')->nullable();
            $table->integer('status')->nullable();
  
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
        Schema::dropIfExists('plantrip_assignments');
    }
}
