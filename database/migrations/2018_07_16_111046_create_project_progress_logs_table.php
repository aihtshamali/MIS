<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectProgressLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_progress_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_activity_id')->unsigned()->index();
            $table->foreign('project_activity_id')->references('id')->on('project_activities')->onDelete('cascade');
            $table->integer('progress')->default(0);
            $table->integer('assigned_project_id')->unsigned()->index();
            $table->foreign('assigned_project_id')->references('id')->on('assigned_projects')->onDelete('cascade');
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
        Schema::dropIfExists('project_progress_logs');
    }
}
