<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSponsoringAgenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsoring_agencies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('sub_sector_id')->unsigned()->index();
            $table->foreign('sub_sector_id')->references('id')->on('sub_sectors')->onDelete('cascade');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('sponsoring_agencies');
    }
}
