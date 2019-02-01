<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MAssignedProjectHealthSafeties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('m_assigned_project_health_safeties', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('m_health_safety_id')->unsigned()->index();
            $table->foreign('m_health_safety_id')->references('id')->on('m_health_safeties')->onDelete('no action');

            
            $table->string('status');
            $table->string('remarks')->nullable();
            

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
        Schema::dropIfExists('m_assigned_project_health_safeties');

    }
}
