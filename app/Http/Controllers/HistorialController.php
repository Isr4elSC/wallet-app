<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Monedero;

class HistorialController extends Controller
{
    public function index()
    {
        $monederos = Monedero::all();
        return response()->json($monederos);
    }

    public function obtenerTransacciones($id)
    {
        /* Obtiene el historial de transacciones del usuario autenticado.
        Ordena las transacciones por fecha (más reciente primero).
        Retorna el historial en formato JSON. */
        $monedero = Monedero::find($id);
        $transacciones = $monedero->transacciones;

        return response()->json($transacciones);
    }
}
