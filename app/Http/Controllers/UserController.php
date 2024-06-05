<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Monedero;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    // función para mostrar el listado de usuarios
    public function index()
    {
        // recuperamos el listado de usuarios paginados de 20 en 20
        $users = User::simplePaginate(20);
        // redirigimos a la vista de listado de usuarios
        return view('admin.users.index', ['users' => $users]);
    }

    // función para mostrar los datos de un usuario
    public function show(User $user)
    {

        // redirigimos a la vista de detalle del usuario
        return view('admin.users.show', ['user' => $user]);
    }

    // función para crear un nuevo usuario
    public function create()
    {
        // redirigimos a la vista con el formulario de creación de usuario
        return view('admin.users.create', ['user' => new User()]);
    }

    // función para dirigir a la vista para editar un usuario existente
    public function edit(User $user)
    {

        // redirigimos a la vista de edición del usuario
        return view('admin.users.edit', ['user' => $user]);
    }

    // función para actualizar un usuario
    public function update(Request $request, User $user)
    {
        //validamos los datos de la petición
        $validated = $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
        ]);

        // actualizamos los datos del usuario
        $user->update($validated);

        //asignamos el rol al usuario
        if (isset($request->cliente)) {
            $user->assignRole('Cliente');
        } else {
            $user->removeRole('Cliente');
        }
        if (isset($request->comercio)) {
            $user->assignRole('Comercio');
        } else {
            $user->removeRole('Comercio');
        }
        if (isset($request->administrador)) {
            $user->assignRole('Administrador');
        } else {
            $user->removeRole('Administrador');
        }

        //redirigimos a la vista detalle del usuario
        return to_route('users.show', $user)->with('status', 'Usuario actualizado correctamente');
    }

    // función para borrar un usuario
    public function destroy(User $user)
    {
        $user->delete();
        //redirigimos a la vista de listado de usuarios
        return to_route('users.index')->with('status', 'Usuario borrado correctamente');
    }


    public function store(Request $request)
    {

        //validamos los datos de la petición
        $validated = $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed', Rules\Password::defaults(),
        ]);

        //creamos el usuario con los datos validados
        $user = User::create([
            'nombre' => $validated['nombre'],
            'email' => $validated['email'],
            'password' => Hash::make($request->password),
        ]);

        //asignamos el rol al usuario
        // todo usuario por defecto va a ser cliente y va a tener un monedero
        $user->assignRole('Cliente');
        Monedero::create([
            'saldo' => 100,
            'user_id' => $user->id,
        ]);

        if ($request->comercio) {
            $user->assignRole('Comercio');
        }
        if ($request->admin) {
            $user->assignRole('Administrador');
        }

        //creamos y asignamos un monedero al usuario
        $this->crearMonedero($user);

        //redirigimos a la vista de listado de usuarios
        return to_route('users.index')->with('status', 'Usuario creado correctamente');
    }

    public function crearMonedero(User $user)
    {
        $monedero = new Monedero();
        $monedero->saldo = 0;
        $monedero->user_id = $user->id;
        $monedero->save();
    }
}
