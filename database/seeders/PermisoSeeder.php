<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // $permiso = Permission::create(['name' => 'crear',
        //                             'description' => 'CREAR REGSITROS',
        //                             'guard_name' => 'sanctum']);
        // $permiso = Permission::create(['name' => 'modificar',
        //                             'description' => 'MODIFICAR REGISTROS',
        //                             'guard_name' => 'sanctum']);
        // $permiso = Permission::create(['name' => 'eliminar',
        //                             'description' => 'ELIMINAR REGISTROS',
        //                             'guard_name' => 'sanctum']);
        $permiso = Permission::create(['name' => 'ver',
                                    'description' => 'SOLO LECTURA',
                                    'guard_name' => 'sanctum']);
        // $permiso = Permission::create(['name' => 'admin avanzada',
        //                             'description' => 'ACCESO AVANZADO AL SISTEMA',
        //                             'guard_name' => 'sanctum']);
    }
}
