<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaracteristicCategoryCaracteristicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caracteristic_category_caracteristics', function (Blueprint $table) {
            $table->increments('id_pivot_category_caracteristics');
            $table->unsignedInteger('fk_category');
            $table->foreign('fk_category')
                    ->references('id_caracteristic_category')
                    ->on('caracteristic_categories')
                    ->on_delete('setnull');
            $table->unsignedInteger('fk_caracteristic');
            $table->foreign('fk_caracteristic')
                    ->references('id_caracteristic')
                    ->on('caracteristics')
                    ->on_delete('setnull');
            $table->boolean('state')->default(1);
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
        Schema::dropIfExists('caracteristic_category_caracteristics');
    }
}
