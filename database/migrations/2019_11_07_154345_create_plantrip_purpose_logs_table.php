<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantripPurposeLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantrip_purpose_logs', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('plantrip_triprequest_log_id')->unsigned()->index()->nullable();
            $table->foreign('plantrip_triprequest_log_id')->references('id')->on('plantrip_triprequest_logs')->onDelete('cascade');

            $table->integer('plantrip_subcitytype_id')->unsigned()->index()->nullable();
            $table->foreign('plantrip_subcitytype_id')->references('id')->on('plantrip_subcitytypes')->onDelete('cascade');

            $table->integer('plantrip_visitreason_id')->unsigned()->index()->nullable();
            $table->foreign('plantrip_visitreason_id')->references('id')->on('plantrip_visitreasons')->onDelete('cascade');

            $table->integer('plantrip_purposetype_id')->unsigned()->index()->nullable();
            $table->foreign('plantrip_purposetype_id')->references('id')->on('plantrip_purposetypes')->onDelete('cascade');

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
