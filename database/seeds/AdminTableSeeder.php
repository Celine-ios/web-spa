<?php

use Illuminate\Database\Seeder;

use App\Admin;
use App\Role;

class AdminTableSeeder extends Seeder{
    public function run(){
        Admin::truncate();
        $user = Admin::create([
            'name'     => 'Exala Innovacion Digital',
            'username' => 'admin',
            'email'    => 'exalainnovacion@gmail.com',
            'password' => '@exala2018'
        ]);

        $superadmin = Role::where('name', 'superadmin')->pluck('id')->toArray();
        $user->roles()->sync($superadmin);
    }
}
