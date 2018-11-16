<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_approvals', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('trip_request_id')->unsigned()->nullable();
            $table->foreign('trip_request_id')->references('id')->on('trip_requests')->onDelete('noaction');

            $table->integer('toofficer_approval_id')->unsigned()->nullable();
            $table->foreign('toofficer_approval_id')->references('id')->on('toofficer_approvals')->onDelete('noaction');

            $table->boolean('action');

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
        Schema::dropIfExists('request_approvals');
    }
}
