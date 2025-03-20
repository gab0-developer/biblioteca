<?php

namespace Database\Seeders;

use App\Models\Estatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstatuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $role = Estatus::create(['estatu' => 'DISPONIBLE']); //estatus libros
        $role = Estatus::create(['estatu' => 'AGOTADO']); //estatus libros
        $role = Estatus::create(['estatu' => 'ACEPTAR']); //estatus lector
        $role = Estatus::create(['estatu' => 'RECHAZAR']); //estatus lector
    }
}
