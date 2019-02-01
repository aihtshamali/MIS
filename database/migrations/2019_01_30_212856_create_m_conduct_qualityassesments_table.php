<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMConductQualityassesmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_conduct_qualityassesments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('m_project_progress_id')->unsigned()->index()->nullable();
            $table->foreign('m_project_progress_id')->references('id')->on('m_project_progresses')->onDelete('no action');
            
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('m_plan_component_id')->unsigned()->index()->nullable();
            $table->foreign('m_plan_component_id')->references('id')->on('m_plan_components')->onDelete('no action');
            
            $table->integer('m_plan_component_activities_mapping_id')->unsigned()->index()->nullable();
            $table->foreign('m_plan_component_activities_mapping_id')->references('id')->on('m_plan_component_activities_mappings')->onDelete('no action');

            $table->string('assesment')->nullable();
            $table->string('progressinPercentage')->nullable();
            $table->string('remarks')->nullable();
            $table->string('attachement')->nullable();
            
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
        Schema::dropIfExists('m_conduct_qualityassesments');
    }
}
