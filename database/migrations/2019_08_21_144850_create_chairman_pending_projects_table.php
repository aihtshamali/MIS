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
            
            $table->integer('project_id')->unsigned()->index()->nullable();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('no action');
           
            $table->integer('m_chairman_project_id')->unsigned()->index()->nullable();
            $table->foreign('m_chairman_project_id')->references('id')->on('m_chairman_projects')->onDelete('no action');

            $table->integer('m_project_progress_id')->unsigned()->index()->nullable();
            $table->foreign('m_project_progress_id')->references('id')->on('m_project_progresses')->onDelete('no action');

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
