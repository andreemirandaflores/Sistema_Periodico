<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentaAviso extends Model
{
    use HasFactory;

    protected $table = 'venta_avisos';
    protected $primaryKey = 'CodVenta';
    public $timestamps = true;

    protected $fillable = [
        'FechaVenta',
        'HoraVenta',
        'Total',
        'NIT',
        'CodPersonal',
        'NumeroFactura',
        'MetodoPago',
        'Cuf',
        'Cufd',
        'CodigoSucursal',
        'CodigoPuntoVenta'
    ];

    // Relaciones
    public function detalles()
    {
        return $this->hasMany(DetalleVenta::class, 'CodVenta', 'CodVenta');
    }

    public function fechasPublicacion()
    {
        return $this->hasMany(FechaPublicacion::class, 'CodVenta', 'CodVenta');
    }
}
