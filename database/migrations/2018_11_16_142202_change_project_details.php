<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeProjectDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('project_details',function(Blueprint $table){
        $table->date('project_approval_date')->nullable();
        $table->date('admin_approval_date')->nullable();
        $table->date('online_funds_date')->nullable();
        $table->date('actual_start_date')->nullable();
        $table->text('operation_and_maintainence_agency')->nullable();
        $table->text('contractor')->nullable();
        $table->text('design_consultant')->nullable();
        $table->text('supervisory_consultant')->nullable();
        // $table->integer('city_id')->unsigned()->index()->nullable();
        // $table->foreign('city_id')->references('id')->on('cities')->onDelete('no action');
        $table->text('number_of_procurement_packages')->nullable();
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
