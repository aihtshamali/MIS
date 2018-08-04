<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('ADP')->nullable();
            $table->integer('evaluation_type_id')->unsigned()->index()->nullable();
            $table->foreign('evaluation_type_id')->references('id')->on('evaluation_types')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('no action')->nullable();
            $table->integer('assigned_project_id')->unsigned()->index();
            $table->foreign('assigned_project_id')->references('id')->on('assigned_projects')->onDelete('no action');
            $table->string('currency')->nullable();
            $table->double('orignal_cost')->nullable();
            $table->date('planned_start_date')->nullable();
            $table->date('planned_end_date')->nullable();
            $table->date('revised_start_date')->nullable();
            $table->string('project_attachements')->nullable();
            $table->integer('assigning_forum_id')->unsigned()->index()->nullable();
            $table->foreign('assigning_forum_id')->references('id')->on('assigning_forums')->onDelete('cascade');
            $table->integer('approving_forum_id')->unsigned()->index()->nullable();
            $table->foreign('approving_forum_id')->references('id')->on('approving_forums')->onDelete('cascade');
            $table->integer('sub_project_type_id')->unsigned()->index()->nullable();
            $table->foreign('sub_project_type_id')->references('id')->on('sub_project_types')->onDelete('cascade');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('project_logs');
    }
}
