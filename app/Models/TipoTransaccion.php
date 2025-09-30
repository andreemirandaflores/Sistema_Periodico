<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoTransaccion extends Model
{
    use HasFactory;

    protected $table = 'tipo_transaccions';
    protected $primaryKey = 'CodTipo';
    public $timestamps = false;

    protected $fillable = ['DescripcionTipo'];

    public function items()
    {
        return $this->hasMany(ItemTransaccion::class, 'CodTipo', 'CodTipo');
    }
}
