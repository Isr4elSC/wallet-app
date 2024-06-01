<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Monedero;
use Illuminate\Http\Request;
use App\Models\User;
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

    public function index()
    {
        // $users = User::simplePaginate(10);
        // $users = User::get();
        $users = User::simplePaginate(20);

        // return view('admin.users.index', compact('users'));
        // return view('users.index', compact('users'));

        return view('admin.users.index', ['users' => $users]);
    }

    public function show(User $user)
    {
        // return view('admin.users.show', compact('user'));
        // return $user;
        // return User::findOrFail($user);

        return view('admin.users.show', ['user' => $user]);
    }

    public function create()
    {
        return view('admin.users.create', ['user' => new User()]);
    }

    public function edit(User $user)
    {
        // //recuperar el listado de roles
        // $roles = Role::all();
        // return view('admin.users.edit', compact('user', 'roles'));
        return view('admin.users.edit', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        //Llanar la tabla de intermedia
        // $user->roles()->sync($request->role);
        // return redirect()->route('users.edit', $user)
        //     ->with('success-update', 'Rol establecido correctamente');
        $validated = $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            // 'password' => 'required|confirmed', Rules\Password::defaults(),
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
        // return var_dump(isset($request->cliente), isset($request->comercio), isset($request->admin));
        $user->update($validated);
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

        return redirect()->route('users.show', $user)->with('status', 'Usuario actualizado correctamente');
    }

    public function destroy(User $user)
    {
        $user->delete();
        // session()->flash('status', 'Usuario borrado correctamente');
        // return to_route('users.index');
        return redirect()->route('users.index')->with('status', 'Usuario borrado correctamente');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed', Rules\Password::defaults(),
        ]);
        // $user = new User();
        // $user->nombre = $request->nombre;
        // $user->email = $request->email;
        // // $user->password = $request->password;
        // $user->password = bcrypt($request->password);
        // $user->save();

        // User::create([
        //     'nombre' => $request->nombre,
        //     'email' => $request->email,
        //     'password' => bcrypt($request->password),
        // ]);
        // return var_dump($validated);
        $user = User::create($validated);
        if ($request->cliente) {
            $user->assignRole('Cliente');
        }
        if ($request->comercio) {
            $user->assignRole('Comercio');
        }
        if ($request->admin) {
            $user->assignRole('Administrador');
        }
        // $user->assignRole('Cliente');

        // return redirect()->route('users.index')->with('success-store', 'Usuario creado correctamente');
        // session()->flash('status', 'Usuario creado correctamente');
        return to_route('users.index')->with('status', 'Usuario creado correctamente');
    }

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
