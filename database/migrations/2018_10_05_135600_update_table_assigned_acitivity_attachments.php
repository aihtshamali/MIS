<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableAssignedAcitivityAttachments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

      Schema::table('assigned_activity_attachments',function(Blueprint $table){
        $table->dropColumn('project_attachements');
      });
        Schema::table('assigned_activity_attachments',function(Blueprint $table){
          $table->string('type')->nullable();
          $table->string('project_attachements','MAX')->nullable();
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
