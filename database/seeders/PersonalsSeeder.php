<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PersonalsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('personals')->insert([
            [
                'CodPersonal' => 1,
                'Nombre' => 'Admin',
                'Apellido' => 'Prueba',
                'email' => 'admin@periodico.test',
                'password' => Hash::make('admin123'), // contraseña clara -> hash Bcrypt
                'telefono' => null,
                'CodCargo' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'CodPersonal' => 2,
                'Nombre' => 'Vendedor',
                'Apellido' => 'Prueba',
                'email' => 'vendedor@periodico.test',
                'password' => Hash::make('vendedor123'),
                'telefono' => null,
                'CodCargo' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'CodPersonal' => 3,
                'Nombre' => 'Producción',
                'Apellido' => 'Prueba',
                'email' => 'produccion@periodico.test',
                'password' => Hash::make('produccion123'),
                'telefono' => null,
                'CodCargo' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'CodPersonal' => 4,
                'Nombre' => 'Cliente',
                'Apellido' => 'Prueba',
                'email' => 'cliente@periodico.test',
                'password' => Hash::make('cliente123'),
                'telefono' => null,
                'CodCargo' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
