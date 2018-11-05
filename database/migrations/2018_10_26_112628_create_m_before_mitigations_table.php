<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMBeforeMitigationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_before_mitigations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('assigned_project_id')->unsigned()->index()->nullable();
            $table->foreign('assigned_project_id')->references('id')->on('assigned_projects')->onDelete('cascade');
            $table->double('probability',8,2)->nullable();
            $table->double('severity_cost',8,2)->nullable();
            $table->double('severity_time',8,2)->nullable();
            $table->double('severity_quantity',8,2)->nullable();
            $table->double('impact',8,2)->nullable();
            $table->string('risk_owner')->nullable();
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
        Schema::dropIfExists('m_before_mitigations');
    }
}
