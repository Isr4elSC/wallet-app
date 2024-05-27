<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    //
    public function index()
    {
        $usuarios = Usuario::all();
        return response()->json($usuarios);
    }

    public function obtenerUsuario($id)
    {
        $usuario = Usuario::find($id);
        return response()->json($usuario);
    }

    public function obtenerTransacciones($id)
    {
        $usuario = Usuario::find($id);
        $transacciones = $usuario->monedero->transacciones;

        return response()->json($transacciones);
    }

    public function obtenerMonedero($id)
    {
        $usuario = Usuario::find($id);
        $monedero = $usuario->monedero;

        return response()->json($monedero);
    }

    public function obtenerSaldo($id)
    {
        $usuario = Usuario::find($id);
        $saldo = $usuario->monedero->saldo;

        return response()->json($saldo);
    }
    public function obtenerSaldoTotal()
    {
        $usuarios = Usuario::all();
        $saldoTotal = 0;
        foreach ($usuarios as $usuario) {
            $saldoTotal += $usuario->monedero->saldo;
        }

        return response()->json($saldoTotal);
    }   
    public crearUsuario(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios',
            'contrasena' => 'required|string|min:8|confirmed'
        ]);

        Usuario::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'contrasena' => bcrypt($request->contrasena)
        ]);

        return response()->json(['message' => 'Usuario creado correctamente.']);
    }   
}
