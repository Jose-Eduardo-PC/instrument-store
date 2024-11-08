<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Crear los roles admin y user si no existen
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);
        
        // Crear el usuario admin
        $adminUser = User::create([
            'name' => 'eduardo',
            'email' => 'eduar@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        $adminUser->assignRole('admin');
        
        // Crear el usuario normal
        $normalUser = User::create([
            'name' => 'juan',
            'email' => 'juan@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        $normalUser->assignRole('user');
    }
}

