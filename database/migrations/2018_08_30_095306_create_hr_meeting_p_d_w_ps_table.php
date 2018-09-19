<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHrMeetingPDWPsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hr_meeting_p_d_w_ps', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('hr_meeting_type_id')->unsigned()->index();
            $table->foreign('hr_meeting_type_id')->references('id')->on('hr_meeting_types')->onDelete('cascade');
            $table->date('scheduled_date');
            $table->date('actual_date')->nullable();
            $table->date('start_time');
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
        Schema::dropIfExists('hr_meeting_p_d_w_ps');
    }
}
