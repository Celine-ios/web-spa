<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionsTableSeeder extends Seeder{
    public function run(){
        $tableNames = DB::select('SHOW TABLES');
        foreach ($tableNames as $name) {
            foreach ($name as $key => $value) {
                if ($value == 'migrations') {
                    continue;
                }
                DB::table($value)->truncate();
            }
        }
        
        Permission::truncate();
        
        Permission::create([
            'name'         => 'create-admin',
            'display_name' => 'Crear Administración',
            'description'  => 'Crear Registros del Área de Administración',
        ]);

        Permission::create([
            'name'         => 'edit-admin',
            'display_name' => 'Editar Administración',
            'description'  => 'Editar Registros del Área de Administración',
        ]);

        Permission::create([
            'name'         => 'delete-admin',
            'display_name' => 'Borrar Administración',
            'description'  => 'Borrar Registros del Área de Administración',
        ]);

        Permission::create([
            'name'         => 'create-user',
            'display_name' => 'Crear Usuarios',
            'description'  => 'Crear Registros del Área de Usuarios',
        ]);

        Permission::create([
            'name'         => 'edit-user',
            'display_name' => 'Editar Usuarios',
            'description'  => 'Editar Registros del Área de Usuarios',
        ]);

        Permission::create([
            'name'         => 'delete-user',
            'display_name' => 'Borrar Usuarios',
            'description'  => 'Borrar Registros del Área de Usuarios',
        ]);

        Permission::create([
            'name'         => 'create-articles',
            'display_name' => 'Crear Artículos',
            'description'  => 'Crear Registros del Área de Artículos',
        ]);

        Permission::create([
            'name'         => 'edit-articles',
            'display_name' => 'Editar Artículos',
            'description'  => 'Editar Registros del Área de Artículos',
        ]);

        Permission::create([
            'name'         => 'delete-articles',
            'display_name' => 'Borrar Artículos',
            'description'  => 'Borrar Registros del Área de Artículos',
        ]);

        Permission::create([
            'name'         => 'create-store',
            'display_name' => 'Crear Tienda',
            'description'  => 'Crear Registros del Área de Tienda',
        ]);

        Permission::create([
            'name'         => 'edit-store',
            'display_name' => 'Editar Tienda',
            'description'  => 'Editar Registros del Área de Tienda',
        ]);

        Permission::create([
            'name'         => 'delete-store',
            'display_name' => 'Borrar Tienda',
            'description'  => 'Borrar Registros del Área de Tienda',
        ]);
    }
}
