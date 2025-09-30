<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoTransaccionItemTransaccion;

class TipoTransaccionItemTransaccionController extends Controller
{
    // Obtener tipos según clasificación
    public function getTipos($tipoAvisoId)
    {
        // Suponiendo que en la tabla hay campo 'tipo_aviso_id' que relaciona
        $tipos = TipoTransaccionItemTransaccion::where('tipo_aviso_id', $tipoAvisoId)
                    ->get(['id', 'DescripcionTipoTransItemTrans']);

        return response()->json(['tipos' => $tipos]);
    }
}
