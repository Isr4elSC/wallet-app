<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    use HasFactory;

    protected $table = 'transacciones';

    protected $fillable = [
        'mondero_id',
        'comercio_id',
        'fecha_transaccion',
        'cantidad',
        'concepto',
        'tipo_transaccion',
        'estado',
    ];

    // public function user()
    // {
    //     return $this->belongsTo(Monedero::class, 'id_monedero')->belongsTo(User::class, 'id_usuario');
    // }

    public function comercio()
    {
        return $this->belongsTo(Comercio::class, 'comercio_id', 'id');
    }

    public function monedero()
    {
        return $this->belongsTo(Monedero::class, 'monedero_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
