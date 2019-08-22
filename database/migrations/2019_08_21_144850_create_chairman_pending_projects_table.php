<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChairmanPendingProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_chairman_pending_projects', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('assigned_by')->unsigned()->index()->nullable();
            $table->foreign('assigned_by')->references('id')->on('users')->onDelete('no action');

            $table->string('gs_num')->nullable();
            $table->string('project_name')->nullable();
            $table->string('final_pc1_approved_cost')->nullable();
            $table->string('final_released_cost')->nullable();
            $table->string('final_utilized_cost')->nullable();
            $table->string('financial_progress_against_pc1_cost')->nullable();
            $table->string('planned_start_date')->nullable();
            $table->string('planned_end_date')->nullable();
            $table->string('physical_progress_planned')->nullable();
            $table->string('physical_progress_actual')->nullable();

            $table->integer('project_id')->unsigned()->index()->nullable();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('no action');

            $table->timestamp('director_assigning_date')->useCurrent();
            $table->string('remarks')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('chairman_pending_projects');
    }
}
