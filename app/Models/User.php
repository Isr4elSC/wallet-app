<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Transaccion;
use App\Models\ParticipacionSorteo;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    // protected $table = 'users';

    protected $fillable = [
        'nombre',
        'email',
        'password',
        // 'fecha_nacimiento',
        // 'telefono',
        // 'direccion',
        // 'foto_perfil'
    ];

    protected $hidden = [
        'password'
    ];

    public function monedero()
    {
        return $this->hasOne(Monedero::class);
    }

    public function comercio()
    {
        return $this->hasOne(Comercio::class);
    }
}
