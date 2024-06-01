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
        'nombre',
        // 'nif',
        // 'categoria',
        'direccion',
        // 'telefono',
        // 'email',
        // 'logo',
        // 'web',
        // 'calificacion',
        'saldo',

    ];

    public function transacciones()
    {
        return $this->hasMany(Transaccion::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Promocion()
    {
        return $this->hasMany(Promocion::class);
    }
}
