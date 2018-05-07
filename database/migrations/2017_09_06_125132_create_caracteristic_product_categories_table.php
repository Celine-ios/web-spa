<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaracteristicProductCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caracteristic_product_categories', function (Blueprint $table) {
            $table->increments('id_pivot_category_products');
            $table->unsignedInteger('fk_category');
            $table->foreign('fk_category')
                    ->references('id_caracteristic_category')
                    ->on('caracteristic_categories')
                    ->on_delete('setnull');
            $table->unsignedInteger('fk_product_category');
            $table->foreign('fk_product_category')
                    ->references('id')
                    ->on('product_subcategories')
                    ->on_delete('setnull');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caracteristic_product_categories');
    }
}
