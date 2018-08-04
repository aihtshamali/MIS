<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeChanges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assigned_department_project_logs' ,function (Blueprint $table) {
          $table->integer('status')->default(0);
        });
        Schema::table('assigned_sponsoring_agency_project_logs', function (Blueprint $table) {
          $table->integer('status')->default(0);
        });
        Schema::table('assigned_executing_agency_project_logs', function (Blueprint $table) {
          $table->integer('status')->default(0);
        });
        Schema::table('revised_approved_cost_project_logs', function (Blueprint $table) {
          $table->integer('status')->default(0);
        });
        Schema::table('revised_end_date_project_logs', function (Blueprint $table) {
          $table->integer('status')->default(0);
        });
        Schema::table('assigned_district_project_logs', function (Blueprint $table) {
          $table->integer('status')->default(0);
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
