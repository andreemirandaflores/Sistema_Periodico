<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormatosAvisoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('formatos_aviso')->insert([
            ['nombre' => 'Normal'],
            ['nombre' => 'Resaltado'],
            ['nombre' => 'Recuadro'],
        ]);
    }
}
