<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMQuestionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_questionnaires', function (Blueprint $table) {
            $table->increments('id');
            $table->string('question')->nullable();
            $table->integer('question_type_id')->index()->nullable();
            $table->foreign('question_type_id')->references('id')->on('question_types')->onDelete('no action');
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
        Schema::dropIfExists('m_questionnaires');
    }
}
