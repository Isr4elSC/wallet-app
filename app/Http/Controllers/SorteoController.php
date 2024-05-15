<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sorteo;
use App\Models\Comercio;

class SorteoController extends Controller
{
    public function crearSorteo(Request $request)
    {
        // Validar datos de entrada (nombre, descripción, fecha, premio, etc.)
        $datos = $request->validate([
            'nombre_sorteo' => 'required|string|max:255',
            'descripcion' => 'required|text',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'premio' => 'required|string',
            'numero_ganadores' => 'required|integer|min:1',
            'condiciones' => 'required|text'
        ]);

        // Obtener el comercio del usuario autenticado
        $comercio = Comercio::find(auth()->user()->id);

        // Crear sorteo en la base de datos
        $sorteo = new Sorteo($datos);
        $sorteo->comercio()->associate($comercio);
        $sorteo->save();

        // Redireccionar a la página de gestión de sorteos del comercio
        return redirect()->route('comercio.sorteos')->with('success', 'Sorteo creado correctamente.');
    }
}
