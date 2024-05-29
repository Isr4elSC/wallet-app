<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comercio;

class ComercioController extends Controller
{
    //

    public function index()
    {
        $comercios = Comercio::simplePaginate(20);
        // return response()->json($comercios);
        return view('admin.comercios.index', ['comercios' => $comercios]);
    }

    public function show(Comercio $comercio)
    {
        return view('admin.comercios.show', ['comercio' => $comercio]);
    }

    public function create()
    {
        return view('admin.comercios.create', ['comercio' => new Comercio()]);
    }

    public function edit(Comercio $comercio)
    {
        return view('admin.comercios.edit', ['comercio' => $comercio]);
    }

    public function update(Request $request, Comercio $comercio)
    {
        $validated = $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
        ]);
        $comercio->update($request->all());
        return redirect()->route('comercios.edit', $comercio)
            ->with('success-update', 'Comercio actualizado correctamente');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
        ]);
        $comercio = Comercio::create($request->all());
        return redirect()->route('comercios.edit', $comercio)
            ->with('success', 'Comercio creado correctamente');
    }

    public function destroy(Comercio $comercio)
    {
        $comercio->delete();
        return redirect()->route('comercios.index')
            ->with('success-delete', 'Comercio eliminado correctamente');
    }
}
