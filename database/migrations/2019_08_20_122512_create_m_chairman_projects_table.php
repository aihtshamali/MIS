<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMChairmanProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_chairman_projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gs_num')->nullable();
            $table->string('project_name')->nullable();
            $table->string('final_pc1_approved_cost')->nullable();
            $table->string('final_released_cost')->nullable();
            $table->string('final_utilized_cost')->nullable();
            $table->string('financial_progress_against_pc1_cost')->nullable();
            $table->string('planned_start_date')->nullable();
            $table->string('planned_end_date')->nullable();
            $table->string('actual_start_date')->nullable();
            $table->string('physical_progress_planned')->nullable();
            $table->string('physical_progress_actual')->nullable();

            $table->integer('project_id')->unsigned()->index()->nullable();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('no action');

            $table->integer('m_project_progress_id')->unsigned()->index()->nullable();
            $table->foreign('m_project_progress_id')->references('id')->on('m_project_progresses')->onDelete('no action');
            
            $table->integer('status')->default(1);

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
        Schema::dropIfExists('m_chairman_projects');
    }
}
