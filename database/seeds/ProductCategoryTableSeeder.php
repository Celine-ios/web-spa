<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str as Str;

use App\ProductCategory;
use App\ProductSubcategory;
use App\ProductFilter;
use App\BannerType;

class ProductCategoryTableSeeder extends Seeder{
    public function run(){
        ProductCategory::truncate();
        ProductSubcategory::truncate();

        $pcat = ProductCategory::create(['nombre' => 'planes', 'descripcion' => 'planes']);
        $type = BannerType::create(['nombre' => ucfirst($pcat->nombre)]);
        $scat = ProductSubcategory::create(['nombre' => '1 mes', 'product_categories_id' => $pcat->id]);
        $scat = ProductSubcategory::create(['nombre' => '3 meses', 'product_categories_id' => $pcat->id]);
        $scat = ProductSubcategory::create(['nombre' => '6 meses', 'product_categories_id' => $pcat->id]);
        $scat = ProductSubcategory::create(['nombre' => '1 año', 'product_categories_id' => $pcat->id]);

    }
}
