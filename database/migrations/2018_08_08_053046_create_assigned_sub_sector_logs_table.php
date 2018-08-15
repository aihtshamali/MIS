<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignedSubSectorLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigned_sub_sector_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_log_id')->unsigned()->index();
            $table->foreign('project_log_id')->references('id')->on('project_logs')->onDelete('cascade');
            $table->integer('sub_sector_id')->unsigned()->index();
            $table->foreign('sub_sector_id')->references('id')->on('sub_sectors')->onDelete('cascade');
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
        Schema::dropIfExists('assigned_sub_sector_logs');
    }
}
