<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemTransaccionsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('item_transaccions')->insert([
            ['CodItemTrans' => 1, 'DescripcionItemTrans' => 'Casas y chalets'],
            ['CodItemTrans' => 2, 'DescripcionItemTrans' => 'Lotes y terrenos'],
            ['CodItemTrans' => 3, 'DescripcionItemTrans' => 'Departamentos'],
            ['CodItemTrans' => 4, 'DescripcionItemTrans' => 'Galpones o tinglados'],
            ['CodItemTrans' => 5, 'DescripcionItemTrans' => 'Oficinas'],
            ['CodItemTrans' => 6, 'DescripcionItemTrans' => 'Locales comerciales'],
            ['CodItemTrans' => 7, 'DescripcionItemTrans' => 'Habitaciones'],
            ['CodItemTrans' => 8, 'DescripcionItemTrans' => 'Edificios'],
            ['CodItemTrans' => 9, 'DescripcionItemTrans' => 'Automóviles'],
            ['CodItemTrans' => 10, 'DescripcionItemTrans' => 'Vagonetas'],
            ['CodItemTrans' => 11, 'DescripcionItemTrans' => 'Motocicletas'],
            ['CodItemTrans' => 12, 'DescripcionItemTrans' => 'Buses y camiones'],
            ['CodItemTrans' => 13, 'DescripcionItemTrans' => 'Tractores'],
            ['CodItemTrans' => 14, 'DescripcionItemTrans' => 'Camionetas'],
            ['CodItemTrans' => 15, 'DescripcionItemTrans' => 'Repuestos y/o accesorios'],
            ['CodItemTrans' => 16, 'DescripcionItemTrans' => 'Educación'],
            ['CodItemTrans' => 17, 'DescripcionItemTrans' => 'Electricidad'],
            ['CodItemTrans' => 18, 'DescripcionItemTrans' => 'Carpintería'],
            ['CodItemTrans' => 19, 'DescripcionItemTrans' => 'Plomería'],
            ['CodItemTrans' => 20, 'DescripcionItemTrans' => 'Gastronomía'],
            ['CodItemTrans' => 21, 'DescripcionItemTrans' => 'Trabajadora/Hogar'],
            ['CodItemTrans' => 22, 'DescripcionItemTrans' => 'Albañilería'],
            ['CodItemTrans' => 23, 'DescripcionItemTrans' => 'Técnicos'],
            ['CodItemTrans' => 24, 'DescripcionItemTrans' => 'Choferes'],
            ['CodItemTrans' => 25, 'DescripcionItemTrans' => 'Profesores'],
        ]);
    }
}
