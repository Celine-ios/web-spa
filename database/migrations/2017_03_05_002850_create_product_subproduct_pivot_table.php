<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSubproductPivotTable extends Migration{
    public function up(){
        Schema::create('product_subproduct', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('subproduct_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('subproduct_id')->references('id')->on('products');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('product_subproduct');
    }
}
