<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoTransaccionItemTransaccion;
use App\Models\TipoAviso;
use App\Models\TipoTransaccion;
use App\Models\ItemTransaccion;
class AvisoController extends Controller
{
    public function getClasificaciones() {
        return TipoAviso::all();
    }

    public function getSubcategorias($id) {
        // Hardcode de relaciones TipoAviso → TipoTransaccion
        $map = [
            1 => [1,2,3,4,5],  // Inmuebles → Venta, Compra, Alquiler, Anticrético, Otro
            2 => [1,2,3,5],    // Vehículos → Venta, Compra, Alquiler, Otro
            3 => [9,10],       // Empleos → Oferta de servicios, Requerimiento de servicios
            4 => [1,2,5],      // Teléfonos → Venta, Compra, Otro
            5 => [1,2,3,5],    // Maquinaria
            6 => [1,2,3,4,5],  // Tecnología
            7 => [1,2,3,9,10], // Música
            8 => [6,7,5],      // Gastronomía
            9 => []            // Varios → ninguno
        ];

        $ids = $map[$id] ?? [];
        $subcategorias = TipoTransaccion::whereIn('CodTipo', $ids)->get();
        return response()->json($subcategorias);
    }

    public function getTipos($id) {
        // Hardcode de relaciones TipoAviso → ItemTransaccion
        $map = [
            1 => [1,2,3,4,5,6,7,8],          // Inmuebles
            2 => [9,10,11,12,13,14,15],      // Vehículos
            3 => [16,17,18,20,21,22,23,24,25], // Empleos
            4 => [28,29],                     // Teléfonos
            5 => [30,31,32,33,34,35],         // Maquinaria
            6 => [36,37,38,39,40,41],         // Tecnología
            7 => [42,43,44,45,46,47],         // Música
            8 => [48,49,50,51],               // Gastronomía
            9 => []                            // Varios
        ];

        $ids = $map[$id] ?? [];
        $tipos = ItemTransaccion::whereIn('CodItemTrans', $ids)->get();
        return response()->json($tipos);
    }
}
