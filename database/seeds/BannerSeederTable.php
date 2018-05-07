<?php

use Illuminate\Database\Seeder;

use App\BannerType;

class BannerSeederTable extends Seeder{

    public function run(){
        BannerType::truncate();
        BannerType::create(['nombre' => 'Principal']);
        BannerType::create(['nombre' => 'Secundario']);
        BannerType::create(['nombre' => 'Terciario']);
        BannerType::create(['nombre' => 'Cuaternario']);
        BannerType::create(['nombre' => 'Video Principal']);
    }
}
