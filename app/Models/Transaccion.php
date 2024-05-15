<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    use HasFactory;

    protected $table = 'transacciones';

    protected $fillable = [
        'id_usuario',
        'id_comercio',
        'fecha_transaccion',
        'monto',
        'tipo_transaccion',
        'estado'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function comercio()
    {
        return $this->belongsTo(Comercio::class);
    }

    public function monedero()
    {
        return $this->belongsTo(Monedero::class);
    }
}
