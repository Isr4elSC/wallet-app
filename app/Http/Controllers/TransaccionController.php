<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaccion;

class TransaccionController extends Controller
{
    public function index()
    {
        $transacciones = Transaccion::all();
        return response()->json($transacciones);
    }

    public function obtenerTransaccion($id)
    {
        $transaccion = Transaccion::find($id);
        $informacionTransaccion = [
            'fecha' => $transaccion->fecha_transaccion->format('d/m/Y H:i'),
            'monto' => $transaccion->monto,
            'tipo' => $transaccion->tipo_transaccion,
            'descripcion' => $transaccion->descripcion,
            'comercio' => $transaccion->comercio->nombre_comercio ?? 'N/A' // Opcional
        ];
        return response()->json($informacionTransaccion);
    }

    public function realizarCompra(Request $request)
    {

        /*Valida los datos de la compra (monto, id_comercio).
            Si el saldo es suficiente, resta el monto de la compra y actualiza el saldo.
            Registra una transacción de tipo "Compra" en la base de datos.
            Redirecciona al usuario con un mensaje de éxito o error.*/

        $datos = $request->validate([
            'id_usuario' => 'required|integer',
            'id_comercio' => 'required|integer',
            'monto' => 'required|numeric'
        ]);
        return response()->json($datos);
    }

    public function realizarDeposito(Request $request)
    {
        /*Valida los datos del depósito (monto).
            Suma el monto al saldo del monedero.
            Registra una transacción de tipo "Depósito" en la base de datos.
            Redirecciona al usuario con un mensaje de éxito o error.*/

        $datos = $request->validate([
            'id_usuario' => 'required|integer',
            'monto' => 'required|numeric'
        ]);
        return response()->json($datos);
    }

    public function procesarPremio(Request $request)
    {
        /*Valida los datos del premio (monto).
            Suma el monto al saldo del monedero.
            Registra una transacción de tipo "Premio" en la base de datos.
            Redirecciona al usuario con un mensaje de éxito o error.*/

        $datos = $request->validate([
            'id_usuario' => 'required|integer',
            'monto' => 'required|numeric'
        ]);
        return response()->json($datos);
    }
}
