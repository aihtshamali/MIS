<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddingColumnInProjectLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('project_logs', function(Blueprint $table){
        $table->integer('assigning_forum_sub_list_id')->unsigned()->index()->nullable();
        $table->foreign('assigning_forum_sub_list_id')->references('id')->on('assigning_forum_sub_lists')->onDelete('no action');
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
