<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promocion;

class PromocionController extends Controller
{
    // sin implementar

    public function index()
    {
        return view('admin.promociones.index');
    }

    public function create()
    {
        return view('admin.promociones.create');
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'descuento' => 'required|numeric',
            'estado' => 'required|string'
        ]);

        $promocion = Promocion::create($datos);

        return redirect()->route('promociones.index', $promocion)->with('status', 'Promocion creada con éxito');
    }

    public function show(Promocion $promocion)
    {
        return view('admin.promociones.show', ['promocion' => $promocion]);
    }

    public function edit(Promocion $promocion)
    {
        return view('admin.promociones.edit', ['promocion' => $promocion]);
    }

    public function update(Request $request, Promocion $promocion)
    {
        $datos = $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'descuento' => 'required|numeric',
            'estado' => 'required|string'
        ]);

        $promocion->update($datos);

        return redirect()->route('promociones.index', $promocion)->with('status', 'Promocion actualizada con éxito');
    }

    public function destroy(Promocion $promocion)
    {
        $promocion->delete();

        return redirect()->route('promociones.index')->with('status', 'Promocion eliminada con éxito');
    }

    public function aplicarPromocion(Promocion $promocion)
    {
        // sin implementar
    }

    public function quitarPromocion(Promocion $promocion)
    {
        // sin implementar
    }

    public function listarPromociones()
    {
        // sin implementar
    }
}
