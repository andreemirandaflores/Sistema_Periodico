<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VentaAviso;
use App\Models\DetalleVenta;
use App\Models\Cliente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VentaAvisoController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'NIT' => 'required|string',
        'nombre' => 'required|string',
        'telefono' => 'nullable|string',
        'texto_aviso' => 'required|string|max:200',
        'tipo' => 'required|integer',
        'fechas' => 'required|string',
        'total' => 'required|numeric|min:0',
        'efectivo' => 'required|numeric',
        'formato' => 'required|string',
    ]);

    DB::beginTransaction();

    try {
        $cliente = Cliente::firstOrCreate(
            ['NIT' => $request->NIT],
            ['NombreCliente' => $request->nombre, 'Telefono' => $request->telefono]
        );

        $venta = VentaAviso::create([
            'FechaVenta' => now()->toDateString(),
            'HoraVenta' => now()->toTimeString(),
            'Total' => (float) $request->total,
            'NIT' => $cliente->NIT,
            'CodPersonal' => Auth::id() ?? 1,
            'NumeroFactura' => $this->generarNumeroFactura(),
            'CUF' => $this->generarCUF(),
            'CUFD' => $this->generarCUFD(),
            'CodigoSucursal' => 0,
            'CodigoPuntoVenta' => null,
            'CodigoMetodoPago' => 1,
            'CodigoMoneda' => 1,
            'TipoCambio' => 1,
            'Leyenda' => 'Ley N° 453: Tienes derecho a recibir información...',
            'CodigoDocumentoSector' => 1
        ]);

        $fechasArr = array_filter(array_map('trim', explode(',', $request->fechas)));
        $cantidad = count($fechasArr);
        $fechaIni = $fechasArr[0] ?? now()->toDateString();
        $fechaFin = $fechasArr[$cantidad - 1] ?? now()->toDateString();
        $precioUnitario = $cantidad > 0 ? round($request->total / $cantidad, 2) : $request->total;

        DetalleVenta::create([
            'FechaIni' => $fechaIni,
            'FechaFin' => $fechaFin,
            'Aviso' => $request->texto_aviso,
            'Formato' => $request->formato,
            'Estado' => 'Nuevo',
            'CodVenta' => $venta->CodVenta,
            'CodTipoTransItemTrans' => $request->tipo,
            'Cantidad' => $cantidad,
            'PrecioUnitario' => $precioUnitario,
            'SubTotal' => $request->total,
            'MontoDescuento' => 0
        ]);

        DB::commit();

        return redirect()->back()->with('success', "Venta registrada correctamente (CodVenta: {$venta->CodVenta})");

    } catch (\Throwable $e) {
        DB::rollBack();
        return redirect()->back()->with('error', 'Error al registrar la venta: ' . $e->getMessage());
    }
}


    // 🔹 Funciones auxiliares
    private function generarNumeroFactura() {
        return (VentaAviso::max('NumeroFactura') ?? 0) + 1;
    }

    private function generarCUF() {
        return 'CUF-' . uniqid();
    }

    private function generarCUFD() {
        return base64_encode(uniqid());
    }
}
