<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangesForScoring extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('districts',function(Blueprint $table){
          $table->double('distance','4','2')->default(0)->nullable();
        });
        Schema::table('assigning_forums',function(Blueprint $table){
          $table->double('score','1','2')->nullable();
        });
        Schema::table('projects',function(Blueprint $table){
          $table->double('score','3','2')->nullable();
        });
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
