<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration{

    public function up(){
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id')->nullable();
            $table->integer('site_id')->nullable();
            $table->string('title');
            $table->text('subtitle')->nullable();
            $table->integer('seller_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->double('price', 15, 2);
            $table->double('ml_price', 15, 2);
            $table->double('local_price', 15, 2);
            $table->boolean('tax')->default(0);
            $table->integer('quantity');
            $table->string('video_id')->nullable();
            $table->text('sellerCustomField')->nullable();
            $table->text('description')->nullable();
            $table->text('specifications')->nullable();
            $table->text('permalink')->nullable();
            $table->text('status')->nullable();
            $table->text('ml_status')->nullable();
            $table->text('warranty')->nullable();
            $table->integer('parent_item_id')->nullable();

            $table->boolean('published')->default(1);
            $table->boolean('product_special')->default(0);
            $table->enum('processor_type', ['n/a', 'intel', 'amd'])->default('n/a');
            $table->integer('brands_id')->unsigned();
            $table->date('available_date')->default(date('Y-m-d', strtotime(0)));
            $table->timestamps();
            $table->string('slug')->unique();

            $table->foreign('brands_id')->references('id')->on('product_brands');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
