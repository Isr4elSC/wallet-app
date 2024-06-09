<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Monedero;
use App\Models\Transaccion;
use App\Models\Comercio;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
    public function show()
    {
        $monedero = Auth::user()->monedero;
        // $monedero = auth()->user()->monedero;
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

        // eliminamos el usuario asociado al monedero
        $monedero->user->delete();

        // redirigimos al usuario con un mensaje de éxito
        return redirect()->route('monederos.index')->with('status', 'Usuario y monedero eliminados con éxito');
    }

    // funcion para mostrar el monedero de un usuario
    public function acceder()
    {
        $user = Auth::user();
        $transacciones = Transaccion::where('monedero_id', $user->monedero->id)
            ->orderBy('fecha_transaccion', 'desc')
            ->orderBy('id', 'desc')
            ->get(); //->paginate(10);

        // $monedero = Monedero::where('user_id', $user->id)->first();
        // redirigimos a la vista de detalle del monedero
        return view('users.mimonedero.show', ['monedero' => $user->monedero], ['transacciones' => $transacciones]);
    }


    function aceptarPago(Request $request)
    {
        $transaccion = Transaccion::find($request->transaccion_id);
        // $transaccion = Transaccion::find($id);
        $monedero = Monedero::find($transaccion->monedero_id);
        $comercio = Comercio::find($transaccion->comercio_id);

        if ($transaccion->estado == 'Pendiente') {
            if (($transaccion->tipo_transaccion == 'Compra') && ($monedero->saldo >= $transaccion->cantidad)) {
                $monedero->saldo -= $transaccion->cantidad;
                $comercio->saldo += $transaccion->cantidad;
            } elseif (($transaccion->tipo_transaccion == 'Recarga') || ($transaccion->tipo_transaccion == 'Premio')) {
                $monedero->saldo += $transaccion->cantidad;
                $comercio->saldo -= $transaccion->cantidad;
            } else {
                return redirect()->route('monedero.usuario')->with('status', 'Sin saldo suficiente');
            }
            $monedero->update();
            $comercio->update();
            $transaccion->estado = 'Realizada';
            $transaccion->update();
            // notificar al email del comercio de la transacción realizada                
            return redirect()->route('monedero.usuario')->with('status', 'Transacción aceptada');
        } else {
            return redirect()->route('monedero.usuario')->with('status', 'No se puede realizar la operación. La transacción esta ' . $transaccion->estado);
        }
    }

    function rechazarPago(Request $request)
    {
        $transaccion = Transaccion::find($request->transaccion_id);

        // $transaccion = Transaccion::find($id);
        if ($transaccion->estado == 'Pendiente') {
            $transaccion->estado = 'Cancelada';
            $transaccion->update();
            // notificar al email comercio de la cancelación de la transacción
            return redirect()->route('monedero.usuario')->with('status', 'Transacción rechazada');
        } else {
            return redirect()->route('monedero.usuario')->with('status', 'No se puede rechazar la operación. La transacción esta ' . $transaccion->estado);
        }
    }
}
