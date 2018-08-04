<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignedDistrictProjectLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigned_district_project_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_log_id')->unsigned()->index();
            $table->foreign('project_log_id')->references('id')->on('project_logs')->onDelete('cascade');
            $table->integer('district_id')->unsigned()->index();
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
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
        Schema::dropIfExists('assigned_district_project_logs');
    }
}
