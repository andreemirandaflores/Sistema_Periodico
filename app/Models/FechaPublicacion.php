<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FechaPublicacion extends Model
{
    use HasFactory;

    protected $table = 'fechas_publicacion';
    protected $fillable = ['CodVenta', 'FechaPublicacion'];
    public $timestamps = false; // opcional, ya que solo complementa

    public function venta()
    {
        return $this->belongsTo(VentaAviso::class, 'CodVenta', 'CodVenta');
    }
}
