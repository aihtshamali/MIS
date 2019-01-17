<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMAssignedProjectFeedBacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_assigned_project_feed_backs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('m_general_feed_back_id')->unsigned()->index()->nullable();
            $table->foreign('m_general_feed_back_id')->references('id')->on('m_general_feed_backs')->onDelete('no action');
            $table->string('answer');
            $table->integer('m_project_progress_id')->unsigned()->index()->nullable();
            $table->foreign('m_project_progress_id')->references('id')->on('m_project_progresses')->onDelete('no action');
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
        Schema::dropIfExists('m_assigned_project_feed_backs');
    }
}
