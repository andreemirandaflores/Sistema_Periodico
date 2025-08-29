<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Personal extends Authenticatable
{
    use Notifiable;

    protected $table = 'personals';      // Nombre de la tabla
    protected $primaryKey = 'CodPersonal'; // Clave primaria
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
}
