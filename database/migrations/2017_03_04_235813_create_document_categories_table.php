<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentCategoriesTable extends Migration{

    public function up(){
        Schema::create('document_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->boolean('estado')->default(1);
            $table->string('slug')->unique();
        });
    }

    public function down(){
        Schema::dropIfExists('document_categories');
    }
}
