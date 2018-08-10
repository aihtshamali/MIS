<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Version1Changes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('sponsoring_agencies', function(Blueprint $table){
         $table->dropIndex('[sub_sector_id]');
         $table->dropColumn('sub_sector_id');
       });
       Schema::table('others', function(Blueprint $table){
         $table->integer('user_id')->unsigned()->index();
         $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
