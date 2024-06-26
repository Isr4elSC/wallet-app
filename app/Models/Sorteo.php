<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sorteo extends Model
{
    use HasFactory;

    protected $table = 'sorteos';

    protected $fillable = [
        'nombre_sorteo',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'premio',
        'numero_ganadores',
        'condiciones'
    ];

    public function comercio()
    {
        return $this->belongsTo(Comercio::class);
    }

    public function participaciones()
    {
        return $this->hasMany(ParticipacionSorteo::class);
    }
}
