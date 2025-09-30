<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoTransaccionItemTransaccion extends Model
{
    protected $table = 'tipo_transaccion_item_transaccions';
    public $timestamps = false;

    protected $fillable = [
        'CodTipo',
        'CodItemTrans',
        'CodTipoAviso',
        'Nombre'
    ];

    public function tipoAviso()
    {
        return $this->belongsTo(TipoAviso::class, 'CodTipoAviso');
    }

    public function transaccion()
    {
        return $this->belongsTo(TipoTransaccion::class, 'CodTipo');
    }

    public function item()
    {
        return $this->belongsTo(ItemTransaccion::class, 'CodItemTrans');
    }
}
