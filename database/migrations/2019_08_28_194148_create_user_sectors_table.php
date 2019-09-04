<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_sectors', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('role_id')->unsigned()->index()->nullable();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('no action');

            $table->integer('sector_id')->unsigned()->index()->nullable();
            $table->foreign('sector_id')->references('id')->on('sectors')->onDelete('no action');

            $table->integer('sub_sector_id')->unsigned()->index()->nullable();
            $table->foreign('sub_sector_id')->references('id')->on('sub_sectors')->onDelete('no action');


            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('no action');
            
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
        Schema::dropIfExists('user_sectors');
    }
}
