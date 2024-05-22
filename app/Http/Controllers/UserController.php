<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UsuarioController extends Controller
{
    //
    public function index()
    {
        $users = User::simplePaginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        //recuperar el listado de roles
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        //Llanar la tabla de intermedia
        $user->roles()->sync($request->role);
        return redirect()->route('users.edit', $user)
            ->with('success-update', 'Rol establecido correctamente');
    }

    public function destroy(User $user)
    {

        $user->delete();
        return redirect()->action('index')
            ->with('success-delete', 'Usuario eliminado correctamente');
    }
}
