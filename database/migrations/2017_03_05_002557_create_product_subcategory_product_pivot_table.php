<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSubcategoryProductPivotTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_subcategory_product', function (Blueprint $table) {
            $table->integer('product_subcategory_id')->unsigned();
            $table->foreign('product_subcategory_id', 'ps_product_subcategory_id')->references('id')->on('product_subcategories');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id', 'ps_product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_subcategory_product');
    }
}
