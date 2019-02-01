<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMAppAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_app_attachments', function (Blueprint $table) {
          $table->increments('id');
          $table->string('attachment_name')->nullable();
          $table->string('type')->nullable();
          $table->string('project_attachement','MAX')->nullable();
          $table->string('longitude')->nullable();
          $table->string('latitude')->nullable();
          $table->integer('m_project_progress_id')->unsigned()->index()->nullable();
          $table->foreign('m_project_progress_id')->references('id')->on('m_project_progresses')->onDelete('no action');
          $table->integer('user_id')->unsigned()->index()->nullable();
          $table->foreign('user_id')->references('id')->on('users')->onDelete('no action');
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_app_attachments');
    }
}
