<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->longtext('texto');
            $table->integer('article_types_id')->unsigned();
            $table->boolean('estado')->default(1);
            $table->string('slug')->unique();

            $table->foreign('article_types_id')->references('id')->on('article_types');
        });
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
