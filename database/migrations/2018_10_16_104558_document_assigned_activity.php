<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DocumentAssignedActivity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('activity_documents', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');
        $table->integer('created_by')->unsigned()->index();
        $table->foreign('created_by')->references('id')->on('users')->onDelete('no action');
        $table->boolean('status')->default(1);
        $table->timestamps();
      });
      Schema::create('assigned_activity_documents', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('activity_document_id')->unsigned()->index()->nullable();
        $table->foreign('activity_document_id')->references('id')->on('activity_documents')->onDelete('no action');
        $table->integer('assigned_project_activity_id')->unsigned()->index()->nullable();
        $table->foreign('assigned_project_activity_id')->references('id')->on('assigned_project_activities')->onDelete('no action');
        $table->boolean('status')->default(1);
        $table->timestamps();
      });
      Schema::table('assigned_activity_attachments', function (Blueprint $table) {
        $table->integer('assigned_activity_document_id')->unsigned()->index()->nullable();
        $table->foreign('assigned_activity_document_id')->references('id')->on('assigned_activity_documents')->onDelete('no action');
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
