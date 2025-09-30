<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemTransaccion extends Model
{
    use HasFactory;

    protected $table = 'item_transaccions';
    protected $primaryKey = 'CodItemTrans';
    public $timestamps = false;

    protected $fillable = ['DescripcionItemTrans', 'CodTipo'];

    public function tipo()
    {
        return $this->belongsTo(TipoTransaccion::class, 'CodTipo', 'CodTipo');
    }
}
