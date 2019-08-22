<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChairmanProjectDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_chairman_project_districts', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('m_chairman_pending_project_id')->unsigned()->index()->nullable();
            $table->foreign('m_chairman_pending_project_id')->references('id')->on('m_chairman_pending_projects')->onDelete('no action');

            $table->integer('disrict_id')->unsigned()->index()->nullable();
            $table->foreign('disrict_id')->references('id')->on('disricts')->onDelete('no action');
            
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
        Schema::dropIfExists('chairman_project_districts');
    }
}
