<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateWeightageColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('m_project_level1_kpis', function (Blueprint $table) 
        {
            $table->float('weightage',8,2)->default(0)->change();
        });
         Schema::table('m_project_level2_kpis', function (Blueprint $table) 
        {
            $table->float('weightage',8,2)->default(0)->change();
        });
         Schema::table('m_project_level3_kpis', function (Blueprint $table) 
        {
            $table->float('weightage',8,2)->default(0)->change();
        });
         Schema::table('m_project_level4_kpis', function (Blueprint $table) 
        {
            $table->float('weightage',8,2)->default(0)->change();
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
