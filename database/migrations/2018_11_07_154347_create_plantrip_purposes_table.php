<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantripPurposesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantrip_purposes', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('plantrip_triprequest_id')->unsigned()->index()->nullable();
            $table->foreign('plantrip_triprequest_id')->references('id')->on('plantrip_triprequests')->onDelete('no action');

            $table->integer('plantrip_subcitytype_id')->unsigned()->index()->nullable();
            $table->foreign('plantrip_subcitytype_id')->references('id')->on('plantrip_subcitytypes')->onDelete('no action');

            $table->integer('plantrip_visitreason_id')->unsigned()->index()->nullable();
            $table->foreign('plantrip_visitreason_id')->references('id')->on('plantrip_visitreasons')->onDelete('no action');

            $table->integer('plantrip_purposetype_id')->unsigned()->index()->nullable();
            $table->foreign('plantrip_purposetype_id')->references('id')->on('plantrip_purposetypes')->onDelete('no action');


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
        Schema::dropIfExists('plantrip_purposes');
    }
}
