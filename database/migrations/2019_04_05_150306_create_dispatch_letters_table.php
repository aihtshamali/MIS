<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDispatchLettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispatch_letters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dispatch_no')->nullable();
            $table->string('subject')->nullable();
            $table->date('issue_date')->nullable();
            $table->string('courier_company')->nullable();
            $table->string('post_office')->nullable();
            $table->string('reg_no')->nullable();
            $table->string('address_dept')->nullable();
            $table->string('scan_document','MAX')->nullable();
            $table->string('document_name')->nullable();
            $table->string('remarks')->nullable();
            
            $table->integer('sender_id')->unsigned()->index()->nullable();
            $table->foreign('sender_id')->references('id')->on('users')->onDelete('no action');
            
            $table->integer('dispatch_letter_priority_id')->unsigned()->index()->nullable();
            $table->foreign('dispatch_letter_priority_id')->references('id')->on('dispatch_letter_priorities')->onDelete('no action');
            
            $table->integer('dispatch_letter_doctype_id')->unsigned()->index()->nullable();
            $table->foreign('dispatch_letter_doctype_id')->references('id')->on('dispatch_letter_doctypes')->onDelete('no action');
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
        Schema::dropIfExists('dispatch_letters');
    }
}
