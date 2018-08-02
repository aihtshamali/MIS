<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProblematicRemarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problematic_remarks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('remarks');
            $table->integer('project_activity_id')->unsigned()->index();
            $table->foreign('project_activity_id')->references('id')->on('project_activities')->onDelete('cascade');
            $table->integer('project_id')->unsigned()->index();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->integer('from_user_id')->unsigned()->index();
            $table->foreign('from_user_id')->references('id')->on('users')->onDelete('no action');
            $table->integer('to_user_id')->unsigned()->index();
            $table->foreign('to_user_id')->references('id')->on('users')->onDelete('no action');
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
        Schema::dropIfExists('problematic_remarks');
    }
}
