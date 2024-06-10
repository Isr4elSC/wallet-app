<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sorteo;

class SorteoController extends Controller
{
    // sin implementar

    public function index()
    {
        return view('admin.sorteos.index');
    }

    public function create()
    {
        return view('admin.sorteos.create');
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
            'fecha' => 'required|date',
            'hora' => 'required|time',
            'premio' => 'required|numeric',
            'estado' => 'required|string'
        ]);

        $sorteo = Sorteo::create($datos);

        return redirect()->route('sorteos.index', $sorteo)->with('status', 'Sorteo creado con éxito');
    }

    public function show(Sorteo $sorteo)
    {
        return view('admin.sorteos.show', ['sorteo' => $sorteo]);
    }

    public function edit(Sorteo $sorteo)
    {
        return view('admin.sorteos.edit', ['sorteo' => $sorteo]);
    }

    public function update(Request $request, Sorteo $sorteo)
    {
        $datos = $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
            'fecha' => 'required|date',
            'hora' => 'required|time',
            'premio' => 'required|numeric',
            'estado' => 'required|string'
        ]);

        $sorteo->update($datos);

        return redirect()->route('sorteos.index', $sorteo)->with('status', 'Sorteo actualizado con éxito');
    }

    public function destroy(Sorteo $sorteo)
    {
        $sorteo->delete();

        return redirect()->route('sorteos.index')->with('status', 'Sorteo eliminado con éxito');
    }

    public function participar(Sorteo $sorteo)
    {
        // sin implementar
    }

    public function sortear(Sorteo $sorteo)
    {
        // sin implementar
    }

    public function ganadores(Sorteo $sorteo)
    {
        // sin implementar
    }

    public function finalizar(Sorteo $sorteo)
    {
        // sin implementar
    }
}
