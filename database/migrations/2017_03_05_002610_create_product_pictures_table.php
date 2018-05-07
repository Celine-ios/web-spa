<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductPicturesTable extends Migration{

    public function up(){
        Schema::create('product_pictures', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('link_imagen');
            $table->integer('products_id')->unsigned();
            $table->timestamps();
            $table->string('slug')->unique();
            $table->integer('posicion')->nullable();
            $table->foreign('products_id')->references('id')->on('products');
        });
    }

    public function down(){
        Schema::dropIfExists('product_pictures');
    }
}
