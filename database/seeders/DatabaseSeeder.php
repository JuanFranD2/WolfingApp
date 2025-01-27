<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear un usuario administrador
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'dni' => '00000001A',
            'phone' => '123456789',
            'address' => 'Admin Street 1',
            'type' => 'admin',
        ]);

        // Crear un usuario operador
        User::create([
            'name' => 'Operator User',
            'email' => 'operator@example.com',
            'password' => Hash::make('password'),
            'dni' => '00000002B',
            'phone' => '987654321',
            'address' => 'Operator Avenue 2',
            'type' => 'oper',
        ]);

        // Crear un usuario cliente
        User::create([
            'name' => 'Client User',
            'email' => 'client@example.com',
            'password' => Hash::make('password'),
            'dni' => '00000003C',
            'phone' => '555123456',
            'address' => 'Client Road 3',
            'type' => 'client',
        ]);
    }
}
