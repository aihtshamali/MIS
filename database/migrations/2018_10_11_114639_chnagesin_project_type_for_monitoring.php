<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChnagesinProjectTypeForMonitoring extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('sub_project_types',function(Blueprint $table){
        $table->integer('project_type_id')->unsigned()->index()->default(1);
        $table->foreign('project_type_id')->references('id')->on('project_types')->onDelete('no action');
      });
      Schema::disableForeignKeyConstraints();
      Schema::table('projects',function(Blueprint $table){
        $table->dropIndex(['evaluation_type_id']);
        // $table->dropColumn(['evaluation_type_id']);
      });
      Schema::table('projects',function(Blueprint $table){
        $table->integer('evaluation_type_id')->unsigned()->index()->nullable();
        $table->foreign('evaluation_type_id')->references('id')->on('evaluation_types')->onDelete('no action');
      });
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
