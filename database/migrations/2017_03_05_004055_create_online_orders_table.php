<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOnlineOrdersTable extends Migration{
    public function up(){
        Schema::create('online_orders', function (Blueprint $table) {
            $table->integer('orders_id')->unsigned()->index();
            $table->string('collection_id');
            $table->string('collection_status');
            $table->string('preference_id');
            $table->string('external_reference');
            $table->string('payment_type');

            $table->string('transportadora')->default('sin asignar');
            $table->string('numero_guia')->default('sin asignar');
            $table->string('link_seguimiento')->default('sin asignar');
            
            $table->timestamps();
            $table->string('slug')->unique();

            $table->foreign('orders_id')->references('id')->on('orders');
            $table->primary(['orders_id']);
        });
    }

    public function down(){
        Schema::dropIfExists('online_orders');
    }
}
