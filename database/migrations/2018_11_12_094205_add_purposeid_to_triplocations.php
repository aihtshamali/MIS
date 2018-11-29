<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPurposeidToTriplocations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('plantrip_triplocations', function (Blueprint $table) {
         
        //     $table->integer('plantrip_purpose_id')->unsigned()->index()->nullable();
        //     $table->foreign('plantrip_purpose_id')->references('id')->on('plantrip_purposes')->onDelete('no action');
           
       
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
