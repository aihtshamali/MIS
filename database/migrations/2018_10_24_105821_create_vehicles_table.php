<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('no_plate')->nullable();

            $table->integer('vehicle_type_id')->unsigned()->nullable();
            $table->foreign('vehicle_type_id')->references('id')->on('vehicle_types')->onDelete('noaction');

            $table->integer('vehicle_document_id')->unsigned()->nullable();
            $table->foreign('vehicle_document_id')->references('id')->on('vehicle_documents')->onDelete('noaction');
            $table->boolean('status')->nullable();
            $table->timestamps();
        });

        Schema::create('vehicle_details', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('vehicle_id')->unsigned()->nullable();
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('noaction');

            $table->integer('mileage')->nullable();
            $table->interger('km')->nullable();
            $table->integer('litres')->nullable();
            $table->integer('oil_change')->nullable();
            $table->integer('tuning')->nullable();
            $table->integer('tires')->nullable();
            $table->integer('brakeshoe')->nullable();
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
        Schema::dropIfExists('vehicles');
    }
}
