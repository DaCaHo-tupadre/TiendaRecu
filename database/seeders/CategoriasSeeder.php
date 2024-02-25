<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create([
            'nombre' => 'Categoría 1',
            'descripcion' => 'Descripción de la categoría 1',
        ]);

        Categoria::create([
            'nombre' => 'Categoría 2',
            'descripcion' => 'Descripción de la categoría 2',
        ]);

    }
}
