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
        // return response()->json($monederos);
        return view('admin.monederos.index', ['monederos' => $monederos]);
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

    public function create()
    {
        return view('admin.monederos.create', ['monedero' => new Monedero()]);
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'user_id' => 'required|integer',
            'saldo' => 'required|numeric'
        ]);

        $monedero = Monedero::create($datos);

        return redirect()->route('monederos.index', $monedero)->with('status', 'Monedero creado con éxito');
    }

    public function show(Monedero $monedero)
    {
        // $monedero = Monedero::find($monedero);
        return view('admin.monederos.show', ['monedero' => $monedero]);
    }

    public function edit(Monedero $monedero)
    {
        return view('admin.monederos.edit', ['monedero' => $monedero]);
    }

    public function update(Request $request, Monedero $monedero)
    {
        $datos = $request->validate([
            'user_id' => 'required|integer',
            'saldo' => 'required|numeric'
        ]);
        // $monedero = Monedero::find($monedero);
        $monedero->update($datos);
        return redirect()->route('monederos.edit', $monedero)->with('status', 'Monedero actualizado con éxito');
    }

    public function destroy(Monedero $monedero)
    {
        $monedero->delete();
        return redirect()->route('monederos.index')->with('status', 'Monedero eliminado con éxito');
    }
}
