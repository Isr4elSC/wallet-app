<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comercio extends Model
{
    use HasFactory;

    protected $table = 'comercios';

    protected $fillable = [
        'user_id',
        'nombre_comercio',
        'descripcion',
        'categoria',
        'direccion',
        'telefono',
        'email',
        'logo',
        'pagina_web',
        'calificacion',
        'saldo_disponible',
        'created_at',
        'updated_at'
    ];

    public function transacciones()
    {
        return $this->hasMany(Transaccion::class);
    }

    public function sorteos()
    {
        return $this->hasMany(Sorteo::class);
    }
}
