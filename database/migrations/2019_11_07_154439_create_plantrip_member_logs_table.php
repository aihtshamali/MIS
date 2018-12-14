<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantripMemberLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantrip_member_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('requested_by')->default(0)->nullable();
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('no action');
            $table->integer('plantrip_purpose_log_id')->unsigned()->index()->nullable();
            $table->foreign('plantrip_purpose_log_id')->references('id')->on('plantrip_purpose_logs')->onDelete('no action');
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
        Schema::dropIfExists('plantrip_members');
    }
}
