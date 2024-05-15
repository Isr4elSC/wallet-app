<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;

class RegistroUsuarioController extends Controller
{
    public function registrarUsuario(Request $request)
    {
        // Validar datos de entrada (nombre, email, contraseña, etc.)
        $datos = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios',
            'contrasena' => 'required|string|min:8|confirmed'
        ]);

        // Crear usuario en la base de datos
        $usuario = Usuario::create($datos);

        // Enviar correo electrónico de confirmación (opcional)

        // Redireccionar a la página de inicio de sesión o perfil
        return redirect()->route('login')->with('success', 'Usuario registrado correctamente.');
    }
}
