<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->interger('cnic');
            $table->string('number');
            $table->string('image');
            $table->integer('driver_document_id')->unsigned()->nullable();
            $table->foreign('driver_document_id')->references('id')->on('driver_documents')->onDelete('noaction');
            $table->boolean('status');
            $table->float('rating');
            $table->integer('leaves');
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
        Schema::dropIfExists('drivers');
    }
}
