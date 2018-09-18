<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableHrAgendas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hr_agendas', function(Blueprint $table){
            $table->dropColumn('agenda_item');
            $table->integer('agenda_type_id')->unsigned()->nullable();
            $table->foreign('agenda_type_id')->references('id')->on('agenda_types')->onDelete('cascade');
            $table->dateTime('actual_start_timeofagenda')->nullable();
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
