<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductFilterProductSubcategoryPivotTable extends Migration{
    public function up(){
        Schema::create('product_filter_product_subcategory', function (Blueprint $table) {
            $table->integer('product_filter_id')->unsigned()->index();
            $table->foreign('product_filter_id', 'pf_ps_id')->references('id')->on('product_filters')->onDelete('cascade');
            $table->integer('product_subcategory_id')->unsigned()->index();
            $table->foreign('product_subcategory_id', 'ps_pf_id')->references('id')->on('product_subcategories')->onDelete('cascade');
            $table->primary(['product_filter_id', 'product_subcategory_id'], 'ps_pf_primary');
        });
    }

    public function down(){
        Schema::dropIfExists('product_filter_product_subcategory');
    }
}
