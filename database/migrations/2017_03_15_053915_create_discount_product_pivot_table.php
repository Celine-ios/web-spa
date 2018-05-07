<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountProductPivotTable extends Migration{
    public function up(){
        Schema::create('discount_product', function (Blueprint $table) {
            $table->integer('discount_id')->unsigned()->index();
            $table->foreign('discount_id')->references('id')->on('discounts')->onDelete('cascade');
            $table->integer('product_id')->unsigned()->index();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->primary(['discount_id', 'product_id']);
        });
    }

    public function down(){
        Schema::dropIfExists('discount_product');
    }
}
