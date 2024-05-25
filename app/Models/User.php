<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Transaccion;
use App\Models\ParticipacionSorteo;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    // protected $table = 'users';

    protected $fillable = [
        'nombre',
        'email',
        'password',
        // 'fecha_nacimiento',
        // 'telefono',
        // 'direccion',
        // 'saldo_monedero',
        // 'foto_perfil'
    ];

    protected $hidden = [
        'password'
    ];

    public function index()
    {
        $usuarios = User::simplePaginate(5);
        return view('admin.usuarios.index', compact('usuarios'));
    }

    public function edit(User $user)
    {
        //recuperar el listado de roles
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Actualizar los roles del usuario
     * 
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * 
     */
    public function actualizar(Request $request, User $user)
    {
        $user->roles()->sync($request->role);
        return redirect()->route('users.edit', $user)
            ->with('success-update', 'Se actualizó el usuario correctamente');
    }

    public function delete()
    {
        $this->perfil->delete();
        $this->monedero->delete();
        return parent::delete();
    }
}
