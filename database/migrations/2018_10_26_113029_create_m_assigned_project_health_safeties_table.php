<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMAssignedProjectHealthSafetiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_assigned_project_health_safeties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('assigned_project_id')->unsigned()->index()->nullable();
            $table->foreign('assigned_project_id')->references('id')->on('assigned_projects')->onDelete('cascade');
            $table->integer('m_health_safeties_id')->unsigned()->index()->nullable();
            $table->foreign('m_health_safeties_id')->references('id')->on('m_health_safeties')->onDelete('cascade');
            $table->boolean('check')->nullable();
            $table->string('remarks','MAX')->nullable();
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
        Schema::dropIfExists('m_assigned_project_health_safeties');
    }
}
