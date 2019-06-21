<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('m_project_progress_id')->unsigned()->index()->nullable();
            $table->foreign('m_project_progress_id')->references('id')->on('m_project_progresses')->onDelete('no action');
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('no action');
            $table->string('block1','MAX')->nullable();
            $table->string('block2','MAX')->nullable();
            $table->string('block3','MAX')->nullable();
            $table->string('block4','MAX')->nullable();
            $table->string('block5','MAX')->nullable();
            $table->string('block6','MAX')->nullable();
            $table->string('block7','MAX')->nullable();
            $table->string('block8','MAX')->nullable();
            $table->string('block9','MAX')->nullable();
            $table->string('block10','MAX')->nullable();
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
        Schema::dropIfExists('report_datas');
    }
}
