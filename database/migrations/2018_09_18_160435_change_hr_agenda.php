<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeHrAgenda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('hr_agendas', function(Blueprint $table){
          $table->dropColumn('actual_start_timeofagenda');
      });
      Schema::table('hr_agendas', function(Blueprint $table){
          $table->text('agenda_actual_start_time')->nullable();
          $table->text('agenda_actual_end_time')->nullable();
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
