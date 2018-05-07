<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_orders', function (Blueprint $table) {
            $table->integer('orders_id')->unsigned()->index();
            $table->string('email');
            $table->string('dni');
            $table->string('nombres');
            $table->string('apellidos');
            $table->mediumText('direccion');
            $table->mediumText('direccion_2')->nullable();
            $table->string('telefono');
            $table->string('telefono_2')->nullable();
            $table->string('fax')->nullable();
            $table->string('ciudad');
            $table->timestamps();
            $table->string('slug')->unique();

            $table->foreign('orders_id')->references('id')->on('orders');
            $table->primary(['orders_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipping_orders');
    }
}
