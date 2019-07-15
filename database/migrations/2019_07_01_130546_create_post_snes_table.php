<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostSnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_snes', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('sne')->default(0);
            $table->string('num_of_staff')->nullable();
            $table->date('conditioned_start_date')->nullable();
            $table->date('conditioned_end_date')->nullable();
            $table->string('recommendation')->nullable();
            $table->string('future_lesson')->nullable();
            $table->integer('assigned_project_id')->unsigned()->index()->nullable();
            $table->foreign('assigned_project_id')->references('id')->on('assigned_projects')->onDelete('no action');
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('no action');
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
        Schema::dropIfExists('post_snes');
    }
}
