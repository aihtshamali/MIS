<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssigningForumSubListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigning_forum_sub_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('assigning_forum_id')->unsigned()->index();
            $table->foreign('assigning_forum_id')->references('id')->on('assigning_forums')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('assigning_forum_sub_lists');
    }
}
