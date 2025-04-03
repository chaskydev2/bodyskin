<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Eliminar administradores existentes
        Admin::truncate();

        // Crear nuevos administradores
        Admin::create([
            'name' => 'Administrador',
            'email' => 'admi@gmail.com',
            'password' => Hash::make('2486'),
        ]);

        Admin::create([
            'name' => 'Administrador 2',
            'email' => 'admi2@gmail.com',
            'password' => Hash::make('123'),
        ]);

        Admin::create([
            'name' => 'Profesor',
            'email' => 'profe@gmail.com',
            'password' => Hash::make('789'),
        ]);
    }
} 