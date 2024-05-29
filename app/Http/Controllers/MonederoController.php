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

    public function obtenerSaldo($id)
    {
        $monedero = Monedero::where('user_id', $id)->first();
        return response()->json($monedero);
    }

    public function monederoUser($user_id)
    {
        $monederos = Monedero::where('user_id', $user_id)->get();
        return view('monedero.index', ['monederos' => $monederos]);
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
            'cantidad' => 'required|numeric',
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

    public function create()
    {
        return view('admin.monederos.create');
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'id_usuario' => 'required|integer',
            'saldo' => 'required|numeric'
        ]);

        $monedero = Monedero::create($datos);

        return redirect()->route('monederos.index')->with('status', 'Monedero creado con éxito');
    }

    public function show($id)
    {
        $monedero = Monedero::find($id);
        return view('admin.monederos.show', ['monedero' => $monedero]);
    }

    public function edit($id)
    {
        $monedero = Monedero::find($id);
        return redirect()->route('monederos.show', $monedero)->with('status', 'Monedero actualizado con éxito');
    }
}
