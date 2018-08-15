<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignedExecutingAgencyProjectLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigned_executing_agency_project_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_log_id')->unsigned()->index();
            $table->foreign('project_log_id')->references('id')->on('project_logs')->onDelete('cascade');
            $table->integer('executing_agency_id')->unsigned()->index();
            $table->foreign('executing_agency_id')->references('id')->on('executing_agencies')->onDelete('cascade');
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
        Schema::dropIfExists('assigned_executing_agency_project_logs');
    }
}
