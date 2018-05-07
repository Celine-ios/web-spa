<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWallpapersTable extends Migration{

    public function up(){
        Schema::create('wallpapers', function (Blueprint $table) {
            $table->increments('id');
            $table->text('link');
            $table->mediumText('link_imagen');
            $table->boolean('estado')->default(1);
            $table->enum('tipo_archivo', ['imagen', 'video'])->default('imagen');
            $table->timestamps();
            $table->string('slug')->unique();
        });
    }

    public function down(){
        Schema::dropIfExists('wallpapers');
    }
}
