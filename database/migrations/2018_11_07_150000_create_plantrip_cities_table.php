<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantripCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantrip_cities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('district_id')->unsigned()->index()->nullable();
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->string('name')->nullable();
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
        Schema::dropIfExists('plantrip_cities');
    }
}
