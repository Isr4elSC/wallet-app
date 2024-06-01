<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Transaccion;


class TransaccionController extends Controller
{
    // función para mostrar el listado de transacciones
    public function index()
    {
        // recuperamos el listado de transacciones ordenado por fecha de transacción
        $transacciones = Transaccion::all()->sortByDesc('fecha_transaccion'); //simplePaginate(15); 
        // $transacciones = DB::table('transacciones')->orderBy('fecha_transaccion')->cursorPaginate(15);
        // return response()->json($transacciones);

        // redirigimos a la vista de listado de transacciones
        return view('admin.transacciones.index', ['transacciones' => $transacciones]);
    }


    // function para mostrar los datos de una transacción
    public function show(Transaccion $transaccion)
    {
        return view('admin.transacciones.show', ['transaccion' => $transaccion]);
    }

    // función para crear una nueva transacción
    public function create()
    {
        // recuperamos la fecha actual
        $carbon = new \Carbon\Carbon();
        $fecha = $carbon->now();

        // redirigimos a la vista de creación de transacción
        return view('admin.transacciones.create', ['transaccion' => new Transaccion(), 'fecha' => $fecha]);
    }

    // función para editar una transacción existente
    public function edit(Transaccion $transaccion)
    {
        // redirigimos a la vista con el formulario de edición de la transacción
        return view('admin.transacciones.edit', ['transaccion' => $transaccion]);
    }

    // función para actualizar una transacción con los datos recibidos
    public function update(Request $request, Transaccion $transaccion)
    {
        // validamos los datos recibidos
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

        // actualizamos la transacción con los datos validados
        $transaccion->update($validated);

        // redirigimos al usuario con un mensaje de éxito
        return redirect()->route('transacciones.edit', $transaccion)
            ->with('success-update', 'Transaccion actualizada correctamente');
    }

    // función para eliminar una transacción
    public function destroy(Transaccion $transaccion)
    {
        // eliminamos la transacción
        $transaccion->delete();

        // redirigimos al usuario con un mensaje de éxito
        return to_route('transacciones.index')
            ->with('success-delete', 'Transaccion eliminada correctamente');
    }

    // función para almacenar una nueva transacción
    public function store(Request $request)
    {
        // validamos los datos recibidos
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

        // almacenamos la transacción en la base de datos
        $transaccion = Transaccion::create($validated);

        // redirigimos al usuario a la vista index con un mensaje de éxito
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
