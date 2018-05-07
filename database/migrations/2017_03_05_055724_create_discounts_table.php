<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountsTable extends Migration{

    public function up(){
        Schema::create('discounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->enum('tipo_cupon', ['normal', 'carro'])->default('normal');
            $table->boolean('activar_codigo')->default(0);
            $table->integer('discount')->default(0);
            $table->double('price', 15, 2)->default(0);
            $table->string('codigo')->nullable();
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');

            $table->boolean('estado')->default(1);
            $table->timestamps();

            $table->string('slug')->unique();
        });
    }

    public function down(){
        Schema::dropIfExists('discounts');
    }
}
