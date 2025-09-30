<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetalleVenta;
use App\Models\VentaAviso;
use Carbon\Carbon;

class DetalleVentaController extends Controller
{
    // Registrar un aviso en detalle_ventas
    public function store(Request $request)
    {
        $request->validate([
            'CodPersonal' => 'required|exists:personals,CodPersonal',
            'NIT' => 'nullable|exists:clientes,NIT',
            'Aviso' => 'required|string|max:200',
            'FechaIni' => 'required|date',
            'FechaFin' => 'required|date|after_or_equal:FechaIni',
            'CodTipoTransItemTrans' => 'required|exists:tipo_transaccion_item_transaccions,id',
            'Total' => 'required|numeric|min:0',
        ]);

        // Crear venta
        $venta = VentaAviso::create([
            'CodPersonal' => $request->CodPersonal,
            'NIT' => $request->NIT,
            'FechaVenta' => Carbon::now()->toDateString(),
            'HoraVenta' => Carbon::now()->toTimeString(),
            'Total' => $request->Total,
        ]);

        // Crear detalle venta
        $detalle = DetalleVenta::create([
            'CodVenta' => $venta->CodVenta,
            'Aviso' => $request->Aviso,
            'FechaIni' => $request->FechaIni,
            'FechaFin' => $request->FechaFin,
            'Estado' => 'Pendiente',
            'CodTipoTransItemTrans' => $request->CodTipoTransItemTrans,
        ]);

        return response()->json([
            'success' => true,
            'venta' => $venta,
            'detalle' => $detalle
        ]);
    }

    // Calcular total según palabras, días y formato
    public function calculateTotal(Request $request)
    {
        $texto = $request->input('Aviso');
        $dias = $request->input('Dias', 1);
        $formato = $request->input('Formato', 'Normal');

        $palabras = str_word_count($texto);
        $precioBase = 0.80 * $palabras * $dias;

        switch ($formato) {
            case 'Resaltado':
                $precioBase += 5 * $dias;
                break;
            case 'Recuadro':
                $precioBase += 15 * $dias;
                break;
        }

        return response()->json(['total' => number_format($precioBase, 2)]);
    }
}
