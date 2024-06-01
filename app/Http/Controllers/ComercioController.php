<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comercio;
use App\Models\User;

class ComercioController extends Controller
{
    //

    public function index()
    {
        $comercios = Comercio::simplePaginate(15);
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
            'user_id'  => 'required',
            'nombre' => 'required',
            'nif' => 'required',
            'direccion' => 'required',
            'poblacion' => 'required',
            'provincia' => 'required',
            'cp' => 'required|numeric|digits:5',
            'telefono' => 'required|numeric|digits:9|starts_with:6,7,9',
            'email' => 'required|email',
            'web' => 'nullable|url',
            'logo' => 'nullable|url',
            'saldo' => 'required|numeric',
        ]);
        $comercio->update($validated);

        $comercio->user->assignRole('Comercio');

        return to_route('comercios.edit', $comercio)
            ->with('status', 'Comercio actualizado correctamente');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id'  => 'required',
            'nombre' => 'required',
            'nif' => 'required',
            'direccion' => 'required',
            'poblacion' => 'required',
            'provincia' => 'required',
            'cp' => 'required|numeric|digits:5',
            'telefono' => 'required|numeric|digits:9|starts_with:6,7,9',
            'email' => 'required|email',
            'web' => 'nullable|url',
            'logo' => 'nullable|url',
            'saldo' => 'required|numeric',
        ]);

        // User::get($validated['user_id'])->assignRole('Comercio');

        $comercio = Comercio::create($validated);
        $comercio->user->assignRole('Comercio');

        return to_route('comercios.edit', $comercio)
            ->with('status', 'Comercio creado correctamente');
    }

    public function destroy(Comercio $comercio)
    {

        $comercio->delete();
        return redirect()->route('comercios.index')
            ->with('status', 'Comercio eliminado correctamente');
    }
}
