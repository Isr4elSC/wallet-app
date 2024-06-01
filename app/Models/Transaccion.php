<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    use HasFactory;

    protected $table = 'transacciones';

    protected $fillable = [
        'monedero_id',
        'comercio_id',
        'fecha_transaccion',
        'cantidad',
        'concepto',
        'tipo_transaccion',
        'estado',
    ];


    public function comercio()
    {
        return $this->belongsTo(Comercio::class, 'comercio_id', 'id');
    }

    public function monedero()
    {
        return $this->belongsTo(Monedero::class, 'monedero_id', 'id');
    }
}
