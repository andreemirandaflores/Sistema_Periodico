<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;

    protected $table = 'detalle_ventas';
    protected $primaryKey = 'CodDetalleVenta';
    public $timestamps = true;

    protected $fillable = [
        'Aviso',
        'Formato',
        'Estado',
        'CodVenta',
        'CodTipoTrans',
        'CodItemTrans',
        'Cantidad',
        'PrecioUnitario',
        'SubTotal',
        'MontoDescuento',
        'CodigoProductoSin',
        'ActividadEconomica',
        'RevisadoPor',
        'FechaRevision'
    ];

    // Relaciones
    public function venta()
    {
        return $this->belongsTo(VentaAviso::class, 'CodVenta', 'CodVenta');
    }

    public function tipoTrans()
    {
        return $this->belongsTo(TipoTransaccion::class, 'CodTipoTrans', 'CodTipo');
    }

    public function itemTrans()
    {
        return $this->belongsTo(ItemTransaccion::class, 'CodItemTrans', 'CodItemTrans');
    }

    public function revisor()
    {
        return $this->belongsTo(Personal::class, 'RevisadoPor', 'CodPersonal');
    }
}
