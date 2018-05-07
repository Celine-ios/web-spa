<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductVideosTable extends Migration{

    public function up(){
        Schema::create('product_videos', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('link_video');
            $table->integer('products_id')->unsigned();
            $table->timestamps();
            $table->string('slug')->unique();

            $table->foreign('products_id')->references('id')->on('products');
        });
    }

    public function down(){
        Schema::dropIfExists('product_videos');
    }
}
