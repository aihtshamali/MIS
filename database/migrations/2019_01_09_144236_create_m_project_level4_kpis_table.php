<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMProjectLevel4KpisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_project_level4_kpis', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name')->nullable();
            $table->integer('weightage')->default(0);
            $table->integer('m_project_level3_kpi')->unsigned()->index()->nullable();
            $table->foreign('m_project_level3_kpi')->references('id')->on('m_project_level3_kpis')->onDelete('cascade');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('m_project_level4_kpis');
    }
}
