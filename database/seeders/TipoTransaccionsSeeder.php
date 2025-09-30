<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoTransaccionsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tipo_transaccions')->insert([
            ['CodTipo' => 1, 'DescripcionTipo' => 'Venta'],
            ['CodTipo' => 2, 'DescripcionTipo' => 'Compra'],
            ['CodTipo' => 3, 'DescripcionTipo' => 'Alquiler'],
            ['CodTipo' => 4, 'DescripcionTipo' => 'Anticrético'],
            ['CodTipo' => 5, 'DescripcionTipo' => 'Otro'],
            ['CodTipo' => 6, 'DescripcionTipo' => 'Oferta'],
            ['CodTipo' => 7, 'DescripcionTipo' => 'Requerimiento'],
            ['CodTipo' => 8, 'DescripcionTipo' => 'Permuta'],
            ['CodTipo' => 9, 'DescripcionTipo' => 'Oferta de servicios'],
            ['CodTipo' => 10, 'DescripcionTipo' => 'Requerimiento de servicios'],
        ]);
    }
}
