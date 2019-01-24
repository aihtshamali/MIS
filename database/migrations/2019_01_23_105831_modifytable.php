<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Modifytable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
      Schema::table('m_plan_kpicomponent_mappings', function(Blueprint $table){
         $table->dropIndex(['m_project_kpi_id']);
         $table->dropForeign(['m_project_kpi_id']);
         $table->dropColumn('m_project_kpi_id');
         $table->integer('general_kpi_id')->unsigned()->index()->nullable();
         $table->foreign('general_kpi_id')->references('id')->on('general_kpis')->onDelete('set null');
       });
       Schema::enableForeignKeyConstraints();
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
