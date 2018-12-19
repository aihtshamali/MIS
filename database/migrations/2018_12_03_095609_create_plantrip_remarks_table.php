<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantripRemarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantrip_remarks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('plantrip_triprequest_id')->unsigned()->index()->nullable();
            $table->foreign('plantrip_triprequest_id')->references('id')->on('plantrip_triprequests')->onDelete('cascade');
            
            $table->integer('remarksby_user_id')->unsigned()->index()->nullable();
            $table->foreign('remarksby_user_id')->references('id')->on('users')->onDelete('no action');
    
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('plantrip_remarks');
    }
}
