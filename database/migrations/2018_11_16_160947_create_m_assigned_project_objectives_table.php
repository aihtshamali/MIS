<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMAssignedProjectObjectivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_assigned_project_objectives', function (Blueprint $table) {
          $table->increments('id');
          $table->text('name')->nullable();
          $table->integer('m_project_progress_id')->unsigned()->index()->nullable();
          $table->foreign('m_project_progress_id')->references('id')->on('m_project_progresses')->onDelete('no action');
          $table->integer('user_id')->unsigned()->index()->nullable();
          $table->foreign('user_id')->references('id')->on('users')->onDelete('no action');
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
        Schema::dropIfExists('m_assigned_project_objectives');
    }
}
