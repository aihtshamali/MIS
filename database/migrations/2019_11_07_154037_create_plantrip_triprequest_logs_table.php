<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantripTriprequestLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantrip_triprequest_logs', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('plantrip_triprequest_id')->unsigned()->index()->nullable();
            $table->foreign('plantrip_triprequest_id')->references('id')->on('plantrip_triprequests')->onDelete('no action');

            $table->integer('editedby_user_id')->unsigned()->index()->nullable();
            $table->foreign('editedby_user_id')->references('id')->on('users')->onDelete('no action');
            
            $table->integer('plantrip_triptype_id')->unsigned()->index()->nullable();
            $table->foreign('plantrip_triptype_id')->references('id')->on('plantrip_triptypes')->onDelete('no action');
            
            $table->string('fullDateoftrip')->nullable();
            $table->boolean('completed')->default(0)->nullable();
            $table->boolean('status')->default(1)->nullable();
            $table->string('approval_status')->nullable();
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
        Schema::dropIfExists('plantrip_triprequests');
    }
}
