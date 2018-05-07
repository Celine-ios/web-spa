<?php

use Illuminate\Database\Seeder;

use App\DocumentCategory;

class DocumentCategoriesTableSeeder extends Seeder{

    public function run(){
        DocumentCategory::truncate();
        DocumentCategory::create(['nombre' => 'RUT']);
        DocumentCategory::create(['nombre' => 'Cámara de Comercio']);
        DocumentCategory::create(['nombre' => 'Certificación Bancaria']);
        DocumentCategory::create(['nombre' => 'RIT']);
        DocumentCategory::create(['nombre' => 'Ley 789']);
    }
}
