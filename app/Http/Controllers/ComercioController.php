<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comercio;
use App\Models\User;

class ComercioController extends Controller
{
    //

    // función para mostrar el listado de comercios
    public function index()
    {
        // recuperamos el listado de comercios paginados de 15 en 15
        $comercios = Comercio::simplePaginate(15);

        // redirigimos a la vista de listado de comercios
        return view('admin.comercios.index', ['comercios' => $comercios]);
    }

    // función para mostrar los datos de un comercio
    public function show(Comercio $comercio)
    {
        // redirigimos a la vista de detalle del comercio
        return view('admin.comercios.show', ['comercio' => $comercio]);
    }

    // función para crear un nuevo comercio
    public function create()
    {

        return view('admin.comercios.create', ['comercio' => new Comercio()]);
    }

    // función para editar un comercio existente
    public function edit(Comercio $comercio)
    {
        // redirigimos a la vista de edición del comercio
        return view('admin.comercios.edit', ['comercio' => $comercio]);
    }

    // función para actualizar un comercio
    public function update(Request $request, Comercio $comercio)
    {
        // validamos los datos recibidos del formulario
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

        // actualizamos el comercio con los datos validados
        $comercio->update($validated);

        // asignamos el rol de comercio al usuario
        $comercio->user->assignRole('Comercio');

        // redirigimos al usuario con un mensaje de éxito
        return to_route('comercios.edit', $comercio)
            ->with('status', 'Comercio actualizado correctamente');
    }

    // función para almacenar un nuevo comercio en la base de datos
    public function store(Request $request)
    {
        // validamos los datos recibidos del formulario
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

        // almacenamos el comercio en la base de datos
        $comercio = Comercio::create($validated);
        // asignamos el rol de comercio al usuario
        $comercio->user->assignRole('Comercio');

        // redirigimos al usuario con un mensaje de éxito
        return to_route('comercios.edit', $comercio)
            ->with('status', 'Comercio creado correctamente');
    }

    // función para eliminar un comercio
    public function destroy(Comercio $comercio)
    {
        // eliminamos el comercio
        $comercio->delete();
        // redirigimos al usuario con un mensaje de éxito
        return redirect()->route('comercios.index')
            ->with('status', 'Comercio eliminado correctamente');
    }
}
