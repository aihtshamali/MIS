<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMAssignedKpiLevel1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_assigned_kpi_level1', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('m_project_progress_id')->unsigned()->index()->nullable();
            $table->foreign('m_project_progress_id')->references('id')->on('m_project_progresses')->onDelete('no action');
            $table->integer('m_plan_kpicomponent_mappings_id')->unsigned()->index()->nullable();
            $table->foreign('m_plan_kpicomponent_mappings_id')->references('id')->on('m_plan_kpicomponent_mappings')->onDelete('no action');
            $table->integer('m_project_level1_kpis_id')->unsigned()->index()->nullable();
            $table->foreign('m_project_level1_kpis_id')->references('id')->on('m_project_level1_kpis')->onDelete('no action');
            $table->boolean('completed')->default(0);
            $table->string('remarks','MAX')->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('m_assigned_kpi_level1');
    }
}
