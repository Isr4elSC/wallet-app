<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Monedero;

class SaldoController extends Controller
{
    public function index()
    {
        $monederos = Monedero::all();
        return response()->json($monederos);
    }

    public function obtenerSaldo($id)
    {
        /*
         Obtiene el saldo del monedero del usuario autenticado.
        Retorna el saldo en formato JSON.
        */
        $monedero = Monedero::where('id_usuario', $id)->first();
        return response()->json($monedero);
    }
}
