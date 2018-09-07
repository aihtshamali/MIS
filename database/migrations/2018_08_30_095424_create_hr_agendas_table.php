<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHrAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hr_agendas', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('hr_meeting_p_d_w_p_id')->unsigned()->index();
            $table->foreign('hr_meeting_p_d_w_p_id')->references('id')->on('hr_meeting_p_d_w_ps')->onDelete('no action');
            
            $table->integer('agenda_item');
            
            $table->integer('hr_project_type_id')->unsigned()->index()->nullable();
            $table->foreign('hr_project_type_id')->references('id')->on('hr_project_types')->onDelete('no action');
            
            $table->string('financial_year')->nullable();
            $table->string('adp_no')->nullable();
            $table->string('scheme_name');
           
            $table->integer('hr_sector_id')->unsigned()->index();
            $table->foreign('hr_sector_id')->references('id')->on('hr_sectors')->onDelete('no action');
      
            $table->double('estimated_cost')->nullable();
            $table->double('adp_allocation')->nullable();
            $table->string('start_timeofagenda');
        
            $table->string('comments')->nullable();

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
        Schema::dropIfExists('hr_agendas');
    }
}
