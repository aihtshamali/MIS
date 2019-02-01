<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMPlanComponentActivitiesMappingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        // Schema::table('m_plan_component_activities_mappings', function (Blueprint $table) {
        //     $table->integer('m_project_progress_id')->unsigned()->index()->nullable();
        //     $table->foreign('m_project_progress_id')->references('id')->on('m_project_progresses')->onDelete('no action');
        // });
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
