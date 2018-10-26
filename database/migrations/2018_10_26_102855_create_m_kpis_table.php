<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMKpisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_kpis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->boolean('status')->default(1);
            $table->integer('sector_id')->unsigned()->index()->nullable();
            $table->foreign('sector_id')->references('id')->on('sectors')->onDelete('cascade');
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
        Schema::dropIfExists('m_kpis');
    }
}
