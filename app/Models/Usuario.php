<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'nombre',
        'email',
        'password',
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
