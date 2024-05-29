<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monedero extends Model
{
    use HasFactory;

    // protected $table = 'monederos';

    protected $fillable = [
        'user_id',
        'saldo',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function transacciones()
    {
        return $this->hasMany(Transaccion::class, 'id_monedero', 'id');
    }
}
