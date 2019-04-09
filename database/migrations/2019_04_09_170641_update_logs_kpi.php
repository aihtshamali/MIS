<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateLogsKpi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('m_assigned_kpi_level1_logs', function (Blueprint $table) {
         $table->integer('weightage')->nullable();
         $table->integer('current_weightage')->nullable();
        });
        Schema::table('m_assigned_kpi_level2_logs', function (Blueprint $table) {
        $table->integer('weightage')->nullable();
        $table->integer('current_weightage')->nullable();
        });
        Schema::table('m_assigned_kpi_level3_logs', function (Blueprint $table) {
        $table->integer('weightage')->nullable();
        $table->integer('current_weightage')->nullable();
        });
        Schema::table('m_assigned_kpi_level4_logs', function (Blueprint $table) {
        $table->integer('weightage')->nullable();
        $table->integer('current_weightage')->nullable();
        });
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
