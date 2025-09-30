<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoAviso extends Model
{
    protected $table = 'tipo_avisos';
    protected $primaryKey = 'CodTipoAviso';
    public $timestamps = false;

    public function relaciones()
    {
        return $this->hasMany(TipoTransaccionItemTransaccion::class, 'CodTipoAviso', 'CodTipoAviso');
    }

    public function transacciones()
    {
        return $this->belongsToMany(
            TipoTransaccion::class,
            'tipo_transaccion_item_transaccions',
            'CodTipoAviso',
            'CodTipo',
            'CodTipoAviso',
            'CodTipo'
        )->withPivot('Nombre', 'CodItemTrans');
    }

    public function items()
    {
        return $this->belongsToMany(
            ItemTransaccion::class,
            'tipo_transaccion_item_transaccions',
            'CodTipoAviso',
            'CodItemTrans',
            'CodTipoAviso',
            'CodItemTrans'
        )->withPivot('Nombre', 'CodTipo');
    }
}
