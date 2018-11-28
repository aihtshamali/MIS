<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropPlantripTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::disableForeignKeyConstraints();
      Schema::dropIfExists('plantrip_members');
      Schema::dropIfExists('plantrip_triplocations');
      Schema::dropIfExists('plantrip_visitedprojects');
      Schema::dropIfExists('plantrip_purposes');
      Schema::dropIfExists('plantrip_purposetypes');
      Schema::dropIfExists('plantrip_cities');
      Schema::dropIfExists('plantrip_subcitytypes');
      Schema::dropIfExists('plantrip_triprequests');
      Schema::dropIfExists('plantrip_triptypes');
      Schema::dropIfExists('plantrip_visitreasons');
      Schema::enableForeignKeyConstraints();
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
