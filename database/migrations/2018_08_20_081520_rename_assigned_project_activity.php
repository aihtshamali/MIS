<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameAssignedProjectActivity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::disableForeignKeyConstraints();
      Schema::table('assigned_activity_attachments', function(Blueprint $table){
        $table->dropIndex(['assigned_project_activities_id']);
         $table->dropForeign(['assigned_project_activities_id']);
         $table->dropColumn('assigned_project_activities_id');
         $table->integer('assigned_project_activity_id')->unsigned()->index()->nullable();
         $table->foreign('assigned_project_activity_id')->references('id')->on('assigned_project_activities')->onDelete('set null');
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
