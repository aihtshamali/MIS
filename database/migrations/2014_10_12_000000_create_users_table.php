<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('admin_password');
            $table->boolean('status')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('user_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('profile_pic')->nullable();
            $table->string('cnic')->nullable();
            $table->integer('grade')->nullable();
            $table->string('contract_type')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('degree_file')->nullable();
            $table->string('cnic_file')->nullable();
            $table->string('cv_file')->nullable();
            $table->integer('age')->nullable();
            $table->double('gross_salary')->nullable();
            $table->double('net_salary')->nullable();
            $table->string('gender')->nullable();
            $table->rememberToken();
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
      Schema::dropIfExists('user_details');
        Schema::dropIfExists('users');
    }
}
