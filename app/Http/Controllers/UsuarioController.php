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
}
