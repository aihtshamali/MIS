<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeProblematicController extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::disableForeignKeyConstraints();
      Schema::table('problematic_remarks', function(Blueprint $table){
        $table->dropIndex(['from_user_id']);
         $table->dropForeign(['from_user_id']);
         $table->dropColumn('from_user_id');
         // Add Foreign Key
         $table->integer('user_id')->unsigned()->index()->nullable();
         $table->foreign('user_id')->references('id')->on('users')->onDelete('no action');
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
