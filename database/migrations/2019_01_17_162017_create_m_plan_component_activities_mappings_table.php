<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMPlanComponentActivitiesMappingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_plan_component_activities_mappings', function (Blueprint $table) {
            $table->increments('id');
            // $table->integer('m_project_progress_id')->unsigned()->index()->nullable();
            // $table->foreign('m_project_progress_id')->references('id')->on('m_project_progresses')->onDelete('no action');

            $table->integer('m_plan_component_id')->unsigned()->index()->nullable();
            $table->foreign('m_plan_component_id')->references('id')->on('m_plan_components')->onDelete('no action');

            $table->string('activity')->nullable();
            $table->boolean('status')->nullable();
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
        Schema::dropIfExists('m_plan_component_activities_mappings');
    }
}
