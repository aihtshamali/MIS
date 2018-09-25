<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatesInMomAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::disableForeignKeyConstraints();

        Schema::table('hr_mom_attachments', function(Blueprint $table){
            $table->dropIndex(['hr_mom_id']);
            $table->dropForeign(['hr_mom_id']);
         $table->dropColumn('hr_mom_id');
            $table->integer('hr_agenda_id')->unsigned()->index();
            $table->foreign('hr_agenda_id')->references('id')->on('hr_agendas')->onDelete('no action');
            $table->string('attachment');
            
        });
       Schema::enableForeignKeyConstraints();

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
