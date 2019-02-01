<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMAssignedKpiLevel4Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_assigned_kpi_level4', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('m_project_progress_id')->unsigned()->index()->nullable();
            $table->foreign('m_project_progress_id')->references('id')->on('m_project_progresses')->onDelete('no action');
            $table->integer('m_assigned_kpi_level3_id')->unsigned()->index()->nullable();
            $table->foreign('m_assigned_kpi_level3_id')->references('id')->on('m_assigned_kpi_level3')->onDelete('no action');
            $table->integer('m_project_level4_kpis_id')->unsigned()->index()->nullable();
            $table->foreign('m_project_level4_kpis_id')->references('id')->on('m_project_level4_kpis')->onDelete('no action');$table->boolean('completed')->default(0);
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
        Schema::dropIfExists('m_assigned_kpi_level4');
    }
}
