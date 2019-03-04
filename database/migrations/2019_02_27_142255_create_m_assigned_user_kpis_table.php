<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMAssignedUserKpisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_assigned_user_kpis', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('m_project_progress_id')->unsigned()->index()->nullable();
            $table->foreign('m_project_progress_id')->references('id')->on('m_project_progresses')->onDelete('no action');
            
            $table->integer('m_assigned_user_location_id')->unsigned()->index()->nullable();
            $table->foreign('m_assigned_user_location_id')->references('id')->on('m_assigned_user_locations')->onDelete('no action');
            
            $table->integer('m_project_kpi_id')->unsigned()->index()->nullable();
            $table->foreign('m_project_kpi_id')->references('id')->on('m_project_kpis')->onDelete('no action');

            $table->timestamps();
        });
        Schema::disableForeignKeyConstraints();
        Schema::table('m_assigned_kpis', function(Blueprint $table){
            $table->dropIndex(['m_project_kpi_id']);
            $table->dropForeign(['m_project_kpi_id']);
            $table->dropColumn('m_project_kpi_id');

        });
        Schema::enableForeignKeyConstraints();

        Schema::table('m_assigned_kpis', function(Blueprint $table){
            $table->integer('m_assigned_user_kpi_id')->unsigned()->index()->nullable();
            $table->foreign('m_assigned_user_kpi_id')->references('id')->on('m_assigned_user_kpis')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_assigned_user_kpis');
    }
}
