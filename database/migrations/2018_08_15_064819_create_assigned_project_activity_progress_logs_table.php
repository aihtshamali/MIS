<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignedProjectActivityProgressLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigned_project_activity_progress_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('assigned_project_activities_id')->unsigned()->index();
            $table->foreign('assigned_project_activities_id')->references('id')->on('assigned_project_activities')->onDelete('cascade');
            $table->double('progress');
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
        Schema::dropIfExists('assigned_project_activity_progress_logs');
    }
}
