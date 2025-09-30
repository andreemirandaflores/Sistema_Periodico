<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoAvisosSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tipo_avisos')->insert([
            ['CodTipoAviso' => 1, 'Descripcion' => 'Inmuebles', 'CodGrupo' => 1],
            ['CodTipoAviso' => 2, 'Descripcion' => 'Vehículos', 'CodGrupo' => 1],
            ['CodTipoAviso' => 3, 'Descripcion' => 'Empleos', 'CodGrupo' => 1],
            ['CodTipoAviso' => 4, 'Descripcion' => 'Teléfonos', 'CodGrupo' => 1],
            ['CodTipoAviso' => 5, 'Descripcion' => 'Maquinaria', 'CodGrupo' => 1],
            ['CodTipoAviso' => 6, 'Descripcion' => 'Tecnología', 'CodGrupo' => 1],
            ['CodTipoAviso' => 7, 'Descripcion' => 'Música', 'CodGrupo' => 1],
            ['CodTipoAviso' => 8, 'Descripcion' => 'Gastronomía', 'CodGrupo' => 1],
            ['CodTipoAviso' => 9, 'Descripcion' => 'Varios', 'CodGrupo' => 1],
        ]);
    }
}
