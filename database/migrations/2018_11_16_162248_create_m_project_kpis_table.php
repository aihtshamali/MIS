<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMProjectKpisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_project_kpis', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name')->nullable();
            $table->integer('weightage')->default(100);
            $table->integer('sector_id')->unsigned()->index()->nullable();
            $table->foreign('sector_id')->references('id')->on('sectors')->onDelete('no action');
            $table->integer('created_by')->unsigned()->index()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('no action');
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
        Schema::dropIfExists('m_project_kpis');
    }
}
