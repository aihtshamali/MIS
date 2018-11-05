<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMRiskCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_risk_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->integer('assigned_project_id')->unsigned()->index()->nullable();
            $table->foreign('assigned_project_id')->references('id')->on('assigned_projects')->onDelete('cascade');
            $table->integer('m_risk_events_id')->unsigned()->index()->nullable();
            $table->foreign('m_risk_events_id')->references('id')->on('m_risk_events')->onDelete('cascade');
            $table->string('risk_response')->nullable();
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
        Schema::dropIfExists('m_risk_categories');
    }
}
