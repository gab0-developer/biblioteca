<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //crear roles de usuarios
        $role = Role::create(['name' => 'administrador','guard_name' => 'sanctum']);
        $role = Role::create(['name' => 'bibliotecario','guard_name' => 'sanctum']);
        $role = Role::create(['name' => 'lector','guard_name' => 'sanctum']);
    }
}
