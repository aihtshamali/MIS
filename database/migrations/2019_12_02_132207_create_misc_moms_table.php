<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMiscMomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('misc_moms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('financialyear_id')->unsigned()->index()->nullable();
            $table->foreign('financialyear_id')->references('id')->on('financialyear')->onDelete('no action');
            $table->string('meeting_num')->nullable();
            $table->string('mom_attachment_file','MAX')->nullable();
            $table->boolean('status')->default('1')->nullable();
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
        Schema::dropIfExists('misc_moms');
    }
}
