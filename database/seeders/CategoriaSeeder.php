<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $cateogoria= Categoria::create(['nombre_categoria' => 'FICCIÓN']);
        $cateogoria= Categoria::create(['nombre_categoria' => 'CIENCIA']);
        $cateogoria= Categoria::create(['nombre_categoria' => 'TECNOLOGÍA']);
        $cateogoria= Categoria::create(['nombre_categoria' => 'FANTASÍA']);
        $cateogoria= Categoria::create(['nombre_categoria' => 'VIAJES Y TURISMO']);
    }
}
