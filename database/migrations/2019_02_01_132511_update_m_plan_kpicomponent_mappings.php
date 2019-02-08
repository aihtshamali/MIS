<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMPlanKpicomponentMappings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
            // Schema::disableForeignKeyConstraints();
            // Schema::table('m_plan_kpicomponent_mappings', function (Blueprint $table) {
            //     $table->dropIndex(['general_kpi_id']); 
            //     $table->dropForeign(['general_kpi_id']); 
            //     $table->dropColumn(['general_kpi_id']);

            //     });
            // Schema::enableForeignKeyConstraints();
            // Schema::table('m_plan_kpicomponent_mappings', function (Blueprint $table) {
            // $table->integer('m_project_kpi_id')->unsigned()->index()->nullable();
            // $table->foreign('m_project_kpi_id')->references('id')->on('m_project_kpis')->onDelete('no action');
            // });
              
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
