<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('trip_type_id')->unsigned()->nullable();
            $table->foreign('trip_type_id')->references('id')->on('trip_types')->onDelete('noaction');
            $table->integer('project_id')->unsigned()->nullable();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('noaction');
            $table->integer('project_purpose_id')->unsigned()->nullable();
            $table->foreign('project_purpose_id')->references('id')->on('project_purposes')->onDelete('noaction');
            $table->string('description');
            $table->date('tour_date');
            $table->time('stayTime');
            $table->time('expectedTimeOfDeparture');
            $table->string('duration');
            $table->boolean('status');
            $table->integer('completed');
            $table->string('commentsFromAuthority');
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
        Schema::dropIfExists('trip_requests');
    }
}
