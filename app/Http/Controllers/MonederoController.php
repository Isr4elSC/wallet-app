<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Monedero;
use App\Models\Transaccion;
use App\Models\User;

class MonederoController extends Controller
{
    //
    // funcion para mostrar el listado de monederos
    public function index()
    {
        // recuperamos el listado de monederos
        $monederos = Monedero::all();

        // redirigimos a la vista de listado de monederos
        return view('admin.monederos.index', ['monederos' => $monederos]);
    }



    // funcion para crear un nuevo monedero
    public function create()
    {
        // redirigimos a la vista con el formulario de creación de monedero
        return view('admin.monederos.create', ['monedero' => new Monedero()]);
    }

    // funcion para almacenar un nuevo monedero
    public function store(Request $request)
    {
        // validamos los datos recibidos del formulario
        $datos = $request->validate([
            'user_id' => 'required|integer',
            'saldo' => 'required|numeric'
        ]);

        // creamos el monedero
        $monedero = Monedero::create($datos);
        // asignamos el rol de cliente al usuario
        $monedero->user->assignRole('Cliente');

        // redirigimos al usuario con un mensaje de éxito
        return redirect()->route('monederos.index', $monedero)->with('status', 'Monedero creado con éxito');
    }

    // funcion para mostrar los datos de un monedero
    public function show(Monedero $monedero)
    {
        // $monedero = Monedero::find($monedero);

        // rediriimos a la vista de detalle del monedero
        return view('admin.monederos.show', ['monedero' => $monedero]);
    }

    // funcion para editar un monedero existente
    public function edit(Monedero $monedero)
    {
        // redirigimos a la vista con el formulario de edición del monedero
        return view('admin.monederos.edit', ['monedero' => $monedero]);
    }

    // funcion para actualizar un monedero con ls datos recibidos
    public function update(Request $request, Monedero $monedero)
    {
        // validamos los datos recibidos
        $datos = $request->validate([
            'user_id' => 'required|integer',
            'saldo' => 'required|numeric'
        ]);

        // actualizamos el monedero
        $monedero->update($datos);

        // asignamos el rol de cliente al usuario
        $monedero->user->assignRole('Cliente');

        // redirigimos al usuario con un mensaje de éxito
        return redirect()->route('monederos.edit', $monedero)->with('status', 'Monedero actualizado con éxito');
    }

    // funcion para borrar un monedero
    public function destroy(Monedero $monedero)
    {
        // eliminamos el monedero
        $monedero->delete();
        // redirigimos al usuario con un mensaje de éxito
        return redirect()->route('monederos.index')->with('status', 'Monedero eliminado con éxito');
    }



    // public function obtenerSaldo($id)
    // {
    //     $monedero = Monedero::where('user_id', $id)->first();
    //     return response()->json($monedero);
    // }

    // public function monederoUser($user_id)
    // {
    //     $monederos = Monedero::where('user_id', $user_id)->get();
    //     return view('monedero.index', ['monederos' => $monederos]);
    // }

    // public function ActualizarSaldo(Request $request)
    // {
    //     $datos = $request->validate([
    //         'id_usuario' => 'required|integer',
    //         'saldo' => 'required|numeric'
    //     ]);

    //     $monedero = Monedero::where('id_usuario', $datos['id_usuario'])->first();
    //     $monedero->saldo = $datos['saldo'];
    //     $monedero->save();

    //     return response()->json($monedero);
    // }
    // public function crearMonedero(Request $request)
    // {
    //     $datos = $request->validate([
    //         'id_usuario' => 'required|integer',
    //         'saldo' => 'required|numeric'
    //     ]);

    //     $monedero = Monedero::create($datos);

    //     return response()->json($monedero);
    // }

    // public function registrarTransaccion(Request $request)
    // {
    //     $datos = $request->validate([
    //         'id_monedero' => 'required|integer',
    //         'cantidad' => 'required|numeric',
    //         'tipo' => 'required|string|in:deposito,retiro'
    //     ]);

    //     $monedero = Monedero::find($datos['id_monedero']);
    //     if ($datos['tipo'] == 'deposito') {
    //         $monedero->saldo += $datos['monto'];
    //     } else {
    //         $monedero->saldo -= $datos['monto'];
    //     }
    //     $monedero->save();

    //     return response()->json($monedero);
    // }
}
