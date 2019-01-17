<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMProjectCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_project_costs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('m_project_progress_id')->unsigned()->index()->nullable();
            $table->foreign('m_project_progress_id')->references('id')->on('m_project_progresses')->onDelete('no action');
            $table->double('adp_allocation_of_fiscal_year',8,4)->nullable();
            $table->double('release_to_date_of_fiscal_year',8,4)->nullable();
            $table->double('total_allocation_by_that_time',8,4)->nullable();
            $table->double('total_release_to_date',8,4)->nullable();
            $table->double('utilization_against_cost_allocation',8,4)->nullable();
            $table->double('utilization_against_releases',8,4)->nullable();
            $table->double('technical_sanction_cost',8,4)->nullable();
            $table->double('contract_award_cost',8,4)->nullable();
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
        Schema::dropIfExists('m_project_costs');
    }
}
