<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipacionSorteo extends Model
{
    use HasFactory;

    protected $table = 'participaciones_sorteos';

    protected $fillable = [
        'user_id',
        'id_sorteo',
        'fecha_participacion'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function sorteo()
    {
        return $this->belongsTo(Sorteo::class);
    }
}
