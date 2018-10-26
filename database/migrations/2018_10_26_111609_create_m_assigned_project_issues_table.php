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
            $table->integer('assigned_project_id')->unsigned()->index()->nullable();
            $table->foreign('assigned_project_id')->references('id')->on('assigned_projects')->onDelete('cascade');
            $table->integer('m_issues_id')->unsigned()->index()->nullable();
            $table->foreign('m_issues_id')->references('id')->on('m_issues')->onDelete('cascade');
            $table->integer('m_severities_id')->unsigned()->index()->nullable();
            $table->foreign('m_severities_id')->references('id')->on('m_severities')->onDelete('cascade');
            $table->string('owner_authorized_person')->nullable();
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
