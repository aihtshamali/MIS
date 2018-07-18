<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('project_no');
            $table->string('ADP');
            $table->integer('project_type_id')->unsigned()->index();
            $table->foreign('project_type_id')->references('id')->on('project_types')->onDelete('cascade');
            $table->integer('evaluation_type_id')->unsigned()->index();
            $table->foreign('evaluation_type_id')->references('id')->on('evaluation_types')->onDelete('cascade');
            $table->integer('status')->default(0);
            $table->timestamps();
        });
        Schema::create('project_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->unsigned()->index();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->string('currency');
            $table->double('orignal_cost');
            $table->double('approved_cost');
            $table->date('planned_start_date');
            $table->date('planned_end_date');
            $table->integer('district_id')->unsigned()->index();
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->date('revised_start_date');
            $table->string('project_attachements')->nullable();
            $table->integer('assigning_forum_id')->unsigned()->index();
            $table->foreign('assigning_forum_id')->references('id')->on('assigning_forums')->onDelete('cascade');
            $table->integer('sub_project_type_id')->unsigned()->index();
            $table->foreign('sub_project_type_id')->references('id')->on('sub_project_types')->onDelete('cascade');
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
      Schema::dropIfExists('project_details');
        Schema::dropIfExists('projects');
    }
}
