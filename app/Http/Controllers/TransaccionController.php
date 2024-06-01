<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Transaccion;


class TransaccionController extends Controller
{
    public function index()
    {
        $transacciones = Transaccion::all()->sortByDesc('fecha_transaccion'); //simplePaginate(15); 
        // $transacciones = DB::table('transacciones')->orderBy('fecha_transaccion')->cursorPaginate(15);
        // return response()->json($transacciones);
        return view('admin.transacciones.index', ['transacciones' => $transacciones]);
    }


    public function show(Transaccion $transaccion)
    {
        return view('admin.transacciones.show', ['transaccion' => $transaccion]);
    }

    public function create()
    {
        $carbon = new \Carbon\Carbon();
        $fecha = $carbon->now();
        return view('admin.transacciones.create', ['transaccion' => new Transaccion(), 'fecha' => $fecha]);
    }

    public function edit(Transaccion $transaccion)
    {
        return view('admin.transacciones.edit', ['transaccion' => $transaccion]);
    }

    public function update(Request $request, Transaccion $transaccion)
    {
        $validated = $request->validate([
            'monedero_id' => 'required|integer',
            'comercio_id' => 'required|integer',
            'fecha_transaccion' => 'required|date',
            'cantidad' => 'required|numeric',
            'concepto' => 'required|string',
            'tipo_transaccion' => 'required|string', // 'Compra', 'Recarga', 'Premio'
            'estado' => 'required|string', // 'Pendiente', 'Aprobado', 'Rechazado
        ]);
        // return var_dump($validated);

        $transaccion->update($validated);
        return redirect()->route('transacciones.edit', $transaccion)
            ->with('success-update', 'Transaccion actualizada correctamente');
    }

    public function destroy(Transaccion $transaccion)
    {
        $transaccion->delete();
        return to_route('transacciones.index')
            ->with('success-delete', 'Transaccion eliminada correctamente');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'monedero_id' => 'required|integer',
            'comercio_id' => 'required|integer',
            'fecha_transaccion' => 'required|date',
            'cantidad' => 'required|numeric',
            'concepto' => 'required|string',
            'tipo_transaccion' => 'required|string', // 'Compra', 'Recarga', 'Premio'
            'estado' => 'required|string', // 'Pendiente', 'Realizada', 'Cancelada'
        ]);
        // return var_dump($validated);

        $transaccion = Transaccion::create($validated);
        return to_route('transacciones.index')->with('success-create', 'Transaccion creada correctamente');
    }

    // public function obtenerTransaccion($id)
    // {
    //     $transaccion = Transaccion::find($id);
    //     $informacionTransaccion = [
    //         'fecha' => $transaccion->fecha_transaccion,
    //         'monto' => $transaccion->monto,
    //         'tipo' => $transaccion->tipo_transaccion,
    //         'descripcion' => $transaccion->descripcion,
    //         'comercio' => $transaccion->comercio->nombre_comercio ?? 'N/A' // Opcional
    //     ];
    //     return response()->json($informacionTransaccion);
    // }

    // public function realizarCompra(Request $request)
    // {

    //     /*Valida los datos de la compra (monto, id_comercio).
    //         Si el saldo es suficiente, resta el monto de la compra y actualiza el saldo.
    //         Registra una transacción de tipo "Compra" en la base de datos.
    //         Redirecciona al usuario con un mensaje de éxito o error.*/

    //     $datos = $request->validate([
    //         'id_usuario' => 'required|integer',
    //         'id_comercio' => 'required|integer',
    //         'monto' => 'required|numeric'
    //     ]);
    //     return response()->json($datos);
    // }

    // public function realizarDeposito(Request $request)
    // {
    //     /*Valida los datos del depósito (monto).
    //         Suma el monto al saldo del monedero.
    //         Registra una transacción de tipo "Depósito" en la base de datos.
    //         Redirecciona al usuario con un mensaje de éxito o error.*/

    //     $datos = $request->validate([
    //         'id_usuario' => 'required|integer',
    //         'monto' => 'required|numeric'
    //     ]);
    //     return response()->json($datos);
    // }

    // public function procesarPremio(Request $request)
    // {
    //     /*Valida los datos del premio (monto).
    //         Suma el monto al saldo del monedero.
    //         Registra una transacción de tipo "Premio" en la base de datos.
    //         Redirecciona al usuario con un mensaje de éxito o error.*/

    //     $datos = $request->validate([
    //         'id_usuario' => 'required|integer',
    //         'monto' => 'required|numeric'
    //     ]);
    //     return response()->json($datos);
    // }

}
