<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    use HasFactory;

    protected $table = 'promociones';

    protected $fillable = [
        'nombre_promocion',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'descuento',
        'condiciones'
    ];

    public function comercio()
    {
        return $this->belongsTo(Comercio::class);
    }
}
