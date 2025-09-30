<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'NIT'; 
    public $incrementing = false;   
    protected $keyType = 'string';  

    protected $fillable = [
        'NIT',
        'NombreCliente',
        'Telefono'
    ];

    public function ventas()
    {
        return $this->hasMany(VentaAviso::class, 'NIT', 'NIT');
    }
}
