<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePcBuildProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pc_build_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pc_build_id')->unsigned()->index();
            $table->integer('product_id')->unsigned()->index();
            $table->integer('cantidad');


            $table->foreign('pc_build_id')->references('id')->on('pc_builds')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pc_build_products');
    }
}
