<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignedProjectActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigned_project_activities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->unsigned()->index();
            $table->foreign('project_id')->references('id')->on('assigned_projects')->onDelete('cascade');
            $table->integer('project_activity_id')->unsigned()->index();
            $table->foreign('project_activity_id')->references('id')->on('project_activities')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('no action');
            $table->integer('assigned_by')->unsigned()->index();
            $table->foreign('assigned_by')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('system_generated_problem')->default(0);
            $table->boolean('self_reported_problem')->default(0);
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
        Schema::dropIfExists('assigned_project_activities');
    }
}
