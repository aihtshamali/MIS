<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantripTriprequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('plantrip_triprequests', function (Blueprint $table) {
        //     $table->increments('id');

        //     $table->integer('plantrip_triptype_id')->unsigned()->index()->nullable();
        //     $table->foreign('plantrip_triptype_id')->references('id')->on('plantrip_triptypes')->onDelete('cascade');

        //     $table->string('fullDateoftrip')->nullable();
        //     $table->boolean('completed')->default(0)->nullable();
        //     $table->boolean('status')->default(1)->nullable();
        //     $table->string('approval_status')->nullable();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plantrip_triprequests');
    }
}
