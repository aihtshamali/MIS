<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMProjectComponentTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_project_component_tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->text('task_name')->nullable();
            $table->text('task_unit')->nullable();
            $table->text('task_quantity')->nullable();
            $table->double('task_cost',8,2)->nullable();
            $table->text('task_duration')->nullable();
            $table->integer('m_assigned_project_objective_id')->unsigned()->index()->nullable();
            $table->foreign('m_assigned_project_objective_id')->references('id')->on('m_assigned_project_objectives')->onDelete('no action');
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
        Schema::dropIfExists('m_project_component_tasks');
    }
}
