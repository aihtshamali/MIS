<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMFinancialPhasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_financial_phases', function (Blueprint $table) {
            $table->increments('id');
            $table->text('financial_year')->nullable();
            $table->text('duration')->nullable();
            $table->double('duration',8,2)->nullable();
            $table->integer('m_project_progress_id')->unsigned()->index()->nullable();
            $table->foreign('m_project_progress_id')->references('id')->on('m_project_progresses')->onDelete('no action');
            $table->text('revised_status')->nullable();
            $table->boolean('status')->nullable();
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
        Schema::dropIfExists('m_financial_phases');
    }
}
