<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHrProjectDecisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hr_project_decisions', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('hr_meeting_p_d_w_p_id')->unsigned()->index();
            $table->foreign('hr_meeting_p_d_w_p_id')->references('id')->on('hr_meeting_p_d_w_ps')->onDelete('no action');

            $table->integer('hr_agenda_id')->unsigned()->index();
            $table->foreign('hr_agenda_id')->references('id')->on('hr_agendas')->onDelete('no action');

            $table->integer('hr_decision_id')->unsigned()->index();
            $table->foreign('hr_decision_id')->references('id')->on('hr_decisions')->onDelete('no action');

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
        Schema::dropIfExists('hr_project_decisions');
    }
}
