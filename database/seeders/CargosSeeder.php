<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CargosSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('cargos')->insert([
            ['CodCargo' => 1, 'NombreCargo' => 'Administrador'],
            ['CodCargo' => 2, 'NombreCargo' => 'Vendedor'],
            ['CodCargo' => 3, 'NombreCargo' => 'Producción'],
            ['CodCargo' => 4, 'NombreCargo' => 'Cliente'],
        ]);
    }
}
