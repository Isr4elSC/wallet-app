<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    
    protected $table = 'usuarios';

    protected $fillable = [
        'nombre',
        'email',
        'contrasena',
        'fecha_nacimiento',
        'telefono',
        'direccion',
        'saldo_monedero',
        'foto_perfil'
    ];

    protected $hidden = [
        'contrasena'
    ];

    public function transacciones()
    {
        return $this->hasMany(Transaccion::class);
    }

    public function participacionesSorteos()
    {
        return $this->hasMany(ParticipacionSorteo::class);
    }
}
