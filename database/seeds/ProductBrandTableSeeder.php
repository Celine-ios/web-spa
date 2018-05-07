<?php

use Illuminate\Database\Seeder;
use App\ProductBrand;

class ProductBrandTableSeeder extends Seeder{

    public function run(){
        ProductBrand::truncate();
        ProductBrand::create(['nombre' => 'N/A']);
        
    }
}
