<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Monedero;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    //

    // public function selectList()
    // {
    //     $users = User::all();

    //     return $users;
    // }

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
        // return view('admin.users.show', compact('user'));
        // return $user;
        // return User::findOrFail($user);

        // redirigimos a la vista de detalle del usuario
        return view('admin.users.show', ['user' => $user]);
    }

    // función para crear un nuevo usuario
    public function create()
    {
        return view('admin.users.create', ['user' => new User()]);
    }

    // función para dirigir a la vista para editar un usuario existente
    public function edit(User $user)
    {
        // //recuperar el listado de roles
        // $roles = Role::all();
        // return view('admin.users.edit', compact('user', 'roles'));

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

        // $user->update($request->all());
        // $user->update($request->only('nombre', 'email'));
        // $user->password = bcrypt($request->password);
        // $user->nombre = $request->nombre;
        // $user->email = $request->email;
        // $user->save();

        // $user->update([
        //     'nombre' => $request->nombre,
        //     'email' => $request->email,
        // ]);

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
        // session()->flash('status', 'Usuario actualizado correctamente');
        // return to_route('user.show', $user);
        //redirigimos a la vista detalle del usuario
        return redirect()->route('users.show', $user)->with('status', 'Usuario actualizado correctamente');
    }

    // función para borrar un usuario
    public function destroy(User $user)
    {
        $user->delete();
        // session()->flash('status', 'Usuario borrado correctamente');
        // return to_route('users.index');
        return redirect()->route('users.index')->with('status', 'Usuario borrado correctamente');
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
            'password' => bcrypt($validated['password']),
        ]);
        // return var_dump($validated);
        // $user = User::create($validated);

        //asignamos el rol al usuario

        // todo usuario por defecto va a ser cliente y va a tener un monedero
        $user->assignRole('Cliente');
        Monedero::create([
            'saldo' => 100,
            'user_id' => $user->id,
        ]);
        // if ($request->cliente) {
        //     $user->assignRole('Cliente');
        // }
        if ($request->comercio) {
            $user->assignRole('Comercio');
        }
        if ($request->admin) {
            $user->assignRole('Administrador');
        }

        //creamos y asignamos un monedero al usuario
        $monedero = new Monedero();
        $monedero->saldo = 0;
        $monedero->user_id = $user->id;
        $monedero->save();

        //redirigimos a la vista de listado de usuarios
        return to_route('users.index')->with('status', 'Usuario creado correctamente');
    }

    // función para asignar un rol a un usuario
    public function setrole(Request $request, User $user)
    {
        $validated = $request->validate([
            'role' => 'required',
        ]);
        $user->roles()->sync($request->role);
        return redirect()->route('users.edit', $user)
            ->with('success-update', 'Rol establecido correctamente');
    }
}
