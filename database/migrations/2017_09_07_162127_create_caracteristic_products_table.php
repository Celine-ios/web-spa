<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaracteristicProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caracteristic_products', function (Blueprint $table) {
            $table->increments('id_caracteristic_product');
            $table->unsignedInteger('fk_category');
            $table->foreign('fk_category')
                    ->references('id_caracteristic_category')
                    ->on('caracteristic_categories')
                    ->on_delete('setnull');
            $table->unsignedInteger('fk_product');
            $table->foreign('fk_product')
                    ->references('id')
                    ->on('products')
                    ->on_delete('setnull');
             $table->unsignedInteger('fk_caracteristic');
            $table->foreign('fk_caracteristic')
                    ->references('id_caracteristic')
                    ->on('caracteristics')
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
        Schema::dropIfExists('caracteristic_products');
    }
}
