<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    use HasFactory;

    protected $table = 'transacciones';

    protected $fillable = [
        // 'id_user',
        'id_monedero',
        'id_comercio',
        'fecha_transaccion',
        'cantidad',
        'tipo_transaccion',
        'estado',
        // 'created_at',
        // 'updated_at'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class);
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
