<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monedero extends Model
{
    use HasFactory;

    protected $table = 'monederos';

    protected $fillable = [
        'id_usuario',
        'saldo'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }


    public function transacciones()
    {
        return $this->hasMany(Transaccion::class, 'id_monedero', 'id');
    }
}
