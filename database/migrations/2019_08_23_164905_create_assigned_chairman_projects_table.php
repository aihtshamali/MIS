<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignedChairmanProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_assigned_chairman_projects', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('m_chairman_pending_project_id')->unsigned()->index()->nullable();
            $table->foreign('m_chairman_pending_project_id')->references('id')->on('m_chairman_pending_projects')->onDelete('no action');

            $table->integer('project_id')->unsigned()->index()->nullable();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('no action');

            $table->timestamp('assigning_date')->useCurrent();
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
        Schema::dropIfExists('assigned_chairman_projects');
    }
}
