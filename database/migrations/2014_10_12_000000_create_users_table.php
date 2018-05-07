<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration{
    public function up(){
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('city')->nullable();

            $table->boolean('active')->default(1);
            $table->date('birthday')->nullable();
            $table->string('avatar')->nullable();
            $table->string('password', 60);
            $table->rememberToken();
            $table->timestamps();
            $table->string('slug')->unique();
        });
    }

    public function down(){
        Schema::dropIfExists('users');
    }
}
