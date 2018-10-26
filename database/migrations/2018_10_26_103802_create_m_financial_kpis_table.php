<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMFinancialKpisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_financial_kpis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('m_financial_datas_id')->unsigned()->index()->nullable();
            $table->foreign('m_financial_datas_id')->references('id')->on('m_financial_datas')->onDelete('cascade');
            $table->integer('m_kpis_id')->unsigned()->index()->nullable();
            $table->foreign('m_kpis_id')->references('id')->on('m_kpis')->onDelete('cascade');
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
        Schema::dropIfExists('m_financial_kpis');
    }
}
