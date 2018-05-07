<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration{
    public function up(){
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->boolean('active')->default(1);
            $table->string('password', 60);
            $table->rememberToken();
            $table->timestamps();
            $table->string('slug')->unique();
        });
    }

    public function down(){
        Schema::dropIfExists('admins');
    }
}
