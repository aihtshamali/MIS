<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsinmonitoring extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('m_app_attachments', function (Blueprint $table) {
            $table->integer('m_user_visitlocation_id')->unsigned()->index()->nullable();
            $table->foreign('m_user_visitlocation_id')->references('id')->on('m_user_visitlocations')->onDelete('no action');
         
        });

        Schema::table('m_project_kpis', function (Blueprint $table) {
         $table->integer('m_user_visitlocation_id')->unsigned()->index()->nullable();
            $table->foreign('m_user_visitlocation_id')->references('id')->on('m_user_visitlocations')->onDelete('no action');
         
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
