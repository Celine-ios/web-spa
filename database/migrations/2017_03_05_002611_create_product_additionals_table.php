<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductAdditionalsTable extends Migration{

    public function up(){
        Schema::create('product_additionals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('content');
            $table->integer('products_id')->unsigned();
            $table->timestamps();
            $table->string('slug')->unique();

            $table->foreign('products_id')->references('id')->on('products');
        });
    }

    public function down(){
        Schema::dropIfExists('product_additionals');
    }
}
