<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWishlistsTable extends Migration{
    public function up(){
        Schema::create('wishlists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->integer('products_id')->unsigned();
            $table->boolean('activo')->default(1);

            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('products_id')->references('id')->on('products');
        });
    }

    public function down(){
        Schema::dropIfExists('wishlists');
    }
}
