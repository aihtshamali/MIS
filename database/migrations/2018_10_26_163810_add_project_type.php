<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProjectType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      // Schema::table('sub_project_types',function(Blueprint $table){
      //   $table->integer('project_type_id')->unsigned()->index()->nullable();
      //   $table->foreign('project_type_id')->references('id')->on('project_types')->onDelete('no action');
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
