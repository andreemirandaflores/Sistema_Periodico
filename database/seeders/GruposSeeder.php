<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GruposSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('grupos')->insert([
            ['CodGrupo' => 1, 'DescripcionGrupo' => 'Económico'],
            ['CodGrupo' => 2, 'DescripcionGrupo' => 'No Económico'],
        ]);
    }
}
