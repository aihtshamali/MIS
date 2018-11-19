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
            $table->integer('sector_id')->unsigned()->index()->nullable();
            $table->foreign('sector_id')->references('id')->on('sectors')->onDelete('no action');
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
        Schema::dropIfExists('m_project_kpis');
    }
}
