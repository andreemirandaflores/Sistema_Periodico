<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('clientes')->insert([
            [
                'NIT' => '123456789',
                'NombreCliente' => 'Nombre Prueba',
                'Telefono' => '12345678',
            ],
        ]);
    }
}
