<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Addcolinmiscmoms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
           Schema::table('misc_moms', function (Blueprint $table) {
        $table->integer('hr_decision_id')->unsigned()->index()->nullable();
            $table->foreign('hr_decision_id')->references('id')->on('hr_decisions')->onDelete('no action');
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
