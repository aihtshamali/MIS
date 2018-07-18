<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectAssignedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigned_projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->unsigned()->index();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->date('assigned_date');
            $table->date('completion_date')->nullable();
            $table->integer('priority')->default(0);
            $table->integer('progress')->default(0);
            $table->date('assumed_completion_date')->nullable();
            $table->integer('assigned_by')->unsigned()->index();
            $table->foreign('assigned_by')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('system_generated_problem')->default(0);
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
        Schema::dropIfExists('assigned_projects');
    }
}
