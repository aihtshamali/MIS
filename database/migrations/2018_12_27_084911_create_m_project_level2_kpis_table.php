<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMProjectLevel2KpisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_project_level2_kpis', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name')->nullable();
            $table->integer('weightage')->default(0);
            $table->integer('m_project_level1_kpi_id')->unsigned()->index()->nullable();
            $table->foreign('m_project_level1_kpi_id')->references('id')->on('m_project_level1_kpis')->onDelete('cascade');
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
        Schema::dropIfExists('m_project_level2_kpis');
    }
}
