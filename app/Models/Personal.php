<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Personal extends Authenticatable
{
    use Notifiable;

    protected $table = 'personals';
    protected $primaryKey = 'CodPersonal';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'Nombre',
        'Apellido',
        'email',
        'password',
        'telefono',
        'CodCargo',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'CodCargo', 'CodCargo');
    }

    public function ventas()
    {
        return $this->hasMany(VentaAviso::class, 'CodPersonal', 'CodPersonal');
    }
}
