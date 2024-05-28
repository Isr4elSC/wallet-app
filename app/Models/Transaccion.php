<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    use HasFactory;

    protected $table = 'transacciones';

    protected $fillable = [
        'id_monedero',
        'id_comercio',
        'fecha_transaccion',
        'cantidad',
        'tipo_transaccion',
        'estado',
        'concepto',
    ];

    public function user()
    {
        return $this->belongsTo(Monedero::class, 'id_user');
    }

    public function comercio()
    {
        return $this->belongsTo(Comercio::class, 'id_comercio');
    }

    public function monedero()
    {
        return $this->belongsTo(Monedero::class, 'id_monedero')->belongsTo(User::class);
    }
}
