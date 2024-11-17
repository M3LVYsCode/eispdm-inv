<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'nombre' => '',
        ]);
        $admin->assignRole('admin');

        $encargado = User::create([
            'nombre' => '',
        ]);
        $encargado->assignRole('encargado');

        $docente = User::create([
            'nombre' => '',
        ]);
        $docente->assignRole('docente');

    }
}
