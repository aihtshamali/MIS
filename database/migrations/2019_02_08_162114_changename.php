<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Changename extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('m_assigned_kpi_level1', function (Blueprint $table) {
            $table->renameColumn('weightage', 'current_weightage')->nullable();
           });
           Schema::table('m_assigned_kpi_level2', function (Blueprint $table) {
            $table->renameColumn('weightage', 'current_weightage')->nullable();
           });
           Schema::table('m_assigned_kpi_level3', function (Blueprint $table) {
            $table->renameColumn('weightage', 'current_weightage')->nullable();
           });
           Schema::table('m_assigned_kpi_level4', function (Blueprint $table) {
            $table->renameColumn('weightage', 'current_weightage')->nullable();
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
