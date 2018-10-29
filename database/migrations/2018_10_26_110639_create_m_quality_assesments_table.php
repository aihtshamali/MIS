<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMQualityAssesmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_quality_assesments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('assigned_project_id')->unsigned()->index()->nullable();
            $table->foreign('assigned_project_id')->references('id')->on('assigned_projects')->onDelete('cascade');
            $table->boolean('test_performed')->nullable();
            $table->boolean('adequate_test_results')->nullable();
            $table->boolean('onsite_lab_established')->nullable();
            $table->boolean('overall_quality_good')->nullable();
            $table->string('comments','MAX')->nullable();
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
        Schema::dropIfExists('m_quality_assesments');
    }
}
