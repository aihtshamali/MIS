<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChairmanProjectSubSectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_chairman_project_sub_sectors', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('m_chairman_project_id')->unsigned()->index()->nullable();
            $table->foreign('m_chairman_project_id')->references('id')->on('m_chairman_projects')->onDelete('no action');

            $table->integer('sub_sector_id')->unsigned()->index()->nullable();
            $table->foreign('sub_sector_id')->references('id')->on('sub_sectors')->onDelete('no action');
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
        Schema::dropIfExists('chairman_project_sub_sectors');
    }
}
