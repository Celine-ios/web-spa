<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder{

    public function run(){
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(BannerSeederTable::class);
        $this->call(DocumentCategoriesTableSeeder::class);
        $this->call(ProductCategoryTableSeeder::class);
        $this->call(ProductBrandTableSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
