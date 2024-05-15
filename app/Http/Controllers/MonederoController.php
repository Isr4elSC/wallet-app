<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Monedero;
use App\Models\Transaccion;

class MonederoController extends Controller
{
    //

    public function index()
    {
        $monederos = Monedero::all();
        return response()->json($monederos);
    }

    public function obtenerSaldo($id)
    {
        $monedero = Monedero::where('id_usuario', $id)->first();
        return response()->json($monedero);
    }

    public function ActualizarSaldo(Request $request)
    {
        $datos = $request->validate([
            'id_usuario' => 'required|integer',
            'saldo' => 'required|numeric'
        ]);

        $monedero = Monedero::where('id_usuario', $datos['id_usuario'])->first();
        $monedero->saldo = $datos['saldo'];
        $monedero->save();

        return response()->json($monedero);
    }
    public function crearMonedero(Request $request)
    {
        $datos = $request->validate([
            'id_usuario' => 'required|integer',
            'saldo' => 'required|numeric'
        ]);

        $monedero = Monedero::create($datos);

        return response()->json($monedero);
    }

    public function registrarTransaccion(Request $request)
    {
        $datos = $request->validate([
            'id_monedero' => 'required|integer',
            'monto' => 'required|numeric',
            'tipo' => 'required|string|in:deposito,retiro'
        ]);

        $monedero = Monedero::find($datos['id_monedero']);
        if ($datos['tipo'] == 'deposito') {
            $monedero->saldo += $datos['monto'];
        } else {
            $monedero->saldo -= $datos['monto'];
        }
        $monedero->save();

        return response()->json($monedero);
    }
}
