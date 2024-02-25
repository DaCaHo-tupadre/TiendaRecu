<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nick' => 'usuario1',
            'nombre' => 'Nombre1',
            'apellidos' => 'Apellido1',
            'dni' => '12345678A',
            'fecha_nacimiento' => '1990-01-01',
            'email' => 'usuario1@example.com',
            'password' => Hash::make('1234'),
            'rol' => 'user',
        ]);

        User::create([
            'nick' => 'usuario2',
            'nombre' => 'Nombre2',
            'apellidos' => 'Apellido2',
            'dni' => '87654321B',
            'fecha_nacimiento' => '1995-02-02',
            'email' => 'usuario2@example.com',
            'password' => Hash::make('1234'),
            'rol' => 'admin',
        ]);
    }
}
