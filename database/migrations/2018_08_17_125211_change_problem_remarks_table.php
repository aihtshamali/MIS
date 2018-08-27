<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeProblemRemarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      //
      Schema::disableForeignKeyConstraints();
      Schema::table('problematic_remarks', function(Blueprint $table){
        $table->dropIndex(['project_activity_id']);
         $table->dropForeign(['project_activity_id']);
         $table->dropColumn('project_activity_id');
         $table->integer('assigned_project_activity_id')->unsigned()->index();
         $table->foreign('assigned_project_activity_id')->references('id')->on('assigned_project_activities')->onDelete('no action');
         $table->integer('read')->default(0);
         $table->integer('status')->default(1);
       });
       Schema::enableForeignKeyConstraints();

       Schema::table('project_attachment_logs', function(Blueprint $table){
         $table->string('project_attachment_name')->nullable();
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
