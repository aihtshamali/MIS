<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantripRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantrip_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('project_id')->unsigned()->index()->nullable();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');

            $table->integer('plantrip_visittype_id')->unsigned()->index()->nullable();
            $table->foreign('plantrip_visittype_id')->references('id')->on('plantrip_visittypes')->onDelete('cascade');

            $table->integer('plantrip_triptype_id')->unsigned()->index()->nullable();
            $table->foreign('plantrip_triptype_id')->references('id')->on('plantrip_triptypes')->onDelete('cascade');
            
            $table->integer('plantrip_purposetype_id')->unsigned()->index()->nullable();
            $table->foreign('plantrip_purposetype_id')->references('id')->on('plantrip_purposetypes')->onDelete('cascade');
           
            $table->integer('fromLocation')->unsigned()->index()->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');

            $table->integer('toLocation')->unsigned()->index()->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            
            $table->integer('plantrip_trip_member_id')->unsigned()->index()->nullable();
            $table->foreign('plantrip_trip_member_id')->references('id')->on('plantrip_trip_members')->onDelete('cascade');

            $table->date('fromDate')->nullable();
            $table->date('toDate')->nullable();
            $table->string('expectedTimeOfDeparture')->nullable();
           
            $table->boolean('status')->nullable();
            $table->boolean('completed')->nullable();



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
        Schema::dropIfExists('plantrip_requests');
    }
}
