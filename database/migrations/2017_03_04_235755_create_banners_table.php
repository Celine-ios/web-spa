<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->increments('id');
            $table->text('link');
            $table->mediumText('link_imagen');
            $table->boolean('estado')->default(1);
            $table->integer('banner_types_id')->unsigned();
            $table->enum('tipo_archivo', ['imagen', 'video'])->default('imagen');
            $table->timestamps();
            $table->string('slug')->unique();

            $table->foreign('banner_types_id')->references('id')->on('banner_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banners');
    }
}
