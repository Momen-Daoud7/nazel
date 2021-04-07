<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('phone')->unique();
            $table->enum('status',['active','not-active'])->default('not-active');
            $table->unsignedBigInteger('orgnaizition');
            $table->foreign('orgnaizition')->references('id')->on('orgnaizitions');
            $table->unsignedBigInteger('branch');
            $table->foreign('branch')->references('id')->on('branches');
            $table->string('password');
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
        Schema::dropIfExists('users');
    }
}
