<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangesInProjectLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('project_logs', function (Blueprint $table) {
          $table->integer('assigned_project_id')->nullable()->change();
          $table->integer('project_id')->unsigned()->index()->nullable();
          $table->foreign('project_id')->references('id')->on('projects')->onDelete('no action');
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
