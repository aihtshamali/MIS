<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCol extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plantrip_remarks', function (Blueprint $table) {
        $table->integer('remarksby_user_id')->unsigned()->index()->nullable();
        $table->foreign('remarksby_user_id')->references('id')->on('users')->onDelete('no action');
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
