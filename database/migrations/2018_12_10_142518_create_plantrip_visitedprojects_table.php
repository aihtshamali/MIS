<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantripVisitedprojectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('plantrip_visitedprojects', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->integer('assigned_project_id')->unsigned()->index()->nullable();
        //     $table->foreign('assigned_project_id')->references('id')->on('assigned_projects')->onDelete('no action');

        //     $table->integer('plantrip_purpose_id')->unsigned()->index()->nullable();
        //     $table->foreign('plantrip_purpose_id')->references('id')->on('plantrip_purposes')->onDelete('no action');
        //     $table->string('description')->nullable();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plantrip_visitedprojects');
    }
}
