<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Updatecol extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hr_project_decisions', function($table)
        {
            $table->integer('hr_decision_id')->nullable()->change();
            // $table->foreign('hr_decision_id')->references('id')->on('hr_decisions')->onDelete('no action');

           
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
