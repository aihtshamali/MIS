<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnActivityDocuments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('assigned_activity_documents', function (Blueprint $table) {
        $table->integer('assigned_project_id')->unsigned()->index()->nullable();
        $table->foreign('assigned_project_id')->references('id')->on('assigned_projects')->onDelete('no action');
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
