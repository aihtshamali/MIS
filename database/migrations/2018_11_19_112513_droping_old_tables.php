<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropingOldTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('m_physical_activities');
        Schema::dropIfExists('m_assesments');
        Schema::dropIfExists('m_assigned_project_health_safeties');
        Schema::dropIfExists('m_assigned_project_issues');
        Schema::dropIfExists('m_before_mitigations');
        Schema::dropIfExists('m_financial_kpis');
        Schema::dropIfExists('m_health_safeties');
        Schema::dropIfExists('m_issues');
        Schema::dropIfExists('m_kpis');
        Schema::dropIfExists('m_quality_assesments');
        Schema::dropIfExists('m_risk_categories');
        Schema::dropIfExists('m_risk_events');
        Schema::dropIfExists('m_severities');
        Schema::dropIfExists('m_stake_holders');
        Schema::dropIfExists('m_subsequents');
        Schema::dropIfExists('m_financial_datas');
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
