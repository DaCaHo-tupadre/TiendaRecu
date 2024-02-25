<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Producto::create([
            'nombre' => 'Producto 1',
            'descripcion' => 'Descripción del producto 1',
            'unidades' => 10,
            'precio_unitario' => 20.5,
            'categoria' => 1,
        ]);

        Producto::create([
            'nombre' => 'Producto 2',
            'descripcion' => 'Descripción del producto 2',
            'unidades' => 15,
            'precio_unitario' => 15.75,
            'categoria' => 2,
        ]);
    }
}
