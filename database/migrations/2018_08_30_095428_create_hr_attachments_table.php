<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHrAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hr_attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hr_agenda_id')->unsigned()->index();
            $table->foreign('hr_agenda_id')->references('id')->on('hr_agendas')->onDelete('no action');
            $table->string('attachments')->nullable();
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
        Schema::dropIfExists('hr_attachments');
    }
}
