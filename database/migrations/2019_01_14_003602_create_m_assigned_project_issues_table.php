<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMAssignedProjectIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_assigned_project_issues', function (Blueprint $table) {
            $table->increments('id');
            $table->string('issue');
            $table->integer('m_issue_type_id')->unsigned()->index();
            $table->foreign('m_issue_type_id')->references('id')->on('m_issue_types')->onDelete('no action');
            $table->string('severity');

            $table->integer('sponsoring_agency_id')->unsigned()->index()->nullable();
            $table->foreign('sponsoring_agency_id')->references('id')->on('sponsoring_agencies')->onDelete('no action');            
            
            $table->integer('executing_agency_id')->unsigned()->index()->nullable();
            $table->foreign('executing_agency_id')->references('id')->on('executing_agencies')->onDelete('no action');         

            $table->integer('m_project_progress_id')->unsigned()->index();
            $table->foreign('m_project_progress_id')->references('id')->on('m_project_progresses')->onDelete('no action');
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
        Schema::dropIfExists('m_assigned_project_issues');
    }
}
