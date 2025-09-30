<?php
namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\VentaAviso;
use App\Models\DetalleVenta;
use App\Models\FechaPublicacion;
use App\Models\TipoTransaccion;
use App\Models\ItemTransaccion;
use Illuminate\Http\Request;

class TestVentaController extends Controller
{
    
    public function create()
    {
        $tipos = TipoTransaccion::all();
        $items = ItemTransaccion::all();

            return view('dashboard.vendedor.aviso_economico');

    }

    public function store(Request $request)
    {
        // 1. Cliente
        $cliente = Cliente::updateOrCreate(
            ['NIT' => $request->NIT],
            ['NombreCliente' => $request->NombreCliente, 'Telefono' => $request->Telefono]
        );

        // 2. Venta
        $venta = VentaAviso::create([
            'FechaVenta' => now()->toDateString(),
            'HoraVenta' => now()->toTimeString(),
            'Total' => $request->Total,
            'NIT' => $cliente->NIT,
            'CodPersonal' => 1, // para pruebas, puede ser fijo
            'NumeroFactura' => 1,
            'MetodoPago' => $request->Efectivo >= $request->Total ? 'Efectivo' : 'Otro',
            'Cuf' => null,
            'Cufd' => null,
            'CodigoSucursal' => 0,
            'CodigoPuntoVenta' => null,
        ]);

        // 3. Detalle de venta
        $detalle = DetalleVenta::create([
            'Aviso' => $request->Aviso,
            'Formato' => $request->Formato,
            'Estado' => 'Pendiente',
            'CodVenta' => $venta->CodVenta,
            'CodTipoTrans' => $request->CodTipoTrans,
            'CodItemTrans' => $request->CodItemTrans,
            'Cantidad' => 1,
            'PrecioUnitario' => $request->Total,
            'SubTotal' => $request->Total,
            'MontoDescuento' => 0,
        ]);

        // 4. Fechas de publicación
        if ($request->Fechas) {
            // Convertimos el string en un array separado por comas
            $fechas = explode(',', $request->Fechas);

            foreach ($fechas as $fecha) {
                $fecha = trim($fecha); // eliminamos espacios por si acaso
                if ($fecha) {
                    FechaPublicacion::create([
                        'CodVenta' => $venta->CodVenta,
                        'FechaPublicacion' => $fecha,
                    ]);
                }
            }
        }
    }
}
