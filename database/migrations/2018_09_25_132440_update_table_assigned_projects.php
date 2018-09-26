<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableAssignedProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('assigned_projects',function(Blueprint $table){
            $table->dropColumn(['progress']);
            // $table->float('progress');
        });
        Schema::enableForeignKeyConstraints();
        Schema::table('assigned_projects',function(Blueprint $table){
            // $table->dropColumn(['progress']);
            $table->float('progress')->default(0)->nullable();
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
