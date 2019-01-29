<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMPlanComponentactivityDetailMappingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_plan_componentactivity_detail_mappings', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('m_plan_component_activities_mapping_id')->unsigned()->index()->nullable();
            $table->foreign('m_plan_component_activities_mapping_id')->references('id')->on('m_plan_component_activities_mappings')->onDelete('no action');

            $table->string('duration')->nullable(); 
            $table->string('unit')->nullable(); 
            $table->string('quantity')->nullable(); 
            $table->string('cost')->nullable(); 
            $table->string('amount')->nullable(); 
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
        Schema::dropIfExists('m_plan_componentactivity_detail_mappings');
    }
}
