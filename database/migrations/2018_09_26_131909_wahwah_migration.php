<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WahwahMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      // Schema::disableForeignKeyConstraints();
      // Schema::table('assigned_project_activities',function(Blueprint $table){
      //   $table->dropForeign('assigned_project_activities_project_id_foreign');
      // });
      // Schema::enableForeignKeyConstraints();

      Schema::table('assigned_project_activities',function(Blueprint $table){
        $table->foreign('project_id')->references('id')->on('assigned_projects');
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
