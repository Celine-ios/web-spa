<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountProductSubcategoryPivotTable extends Migration{
    public function up(){
        Schema::create('discount_product_subcategory', function (Blueprint $table) {
            $table->integer('discount_id')->unsigned()->index();
            $table->foreign('discount_id', 'ps_discount_id')->references('id')->on('discounts')->onDelete('cascade');
            $table->integer('product_subcategory_id')->unsigned()->index();
            $table->foreign('product_subcategory_id', 'ps_subcategory_id')->references('id')->on('product_subcategories')->onDelete('cascade');
            $table->primary(['discount_id', 'product_subcategory_id'], 'ps_discount_primary');
        });
    }

    public function down(){
        Schema::dropIfExists('discount_product_subcategory');
    }
}
