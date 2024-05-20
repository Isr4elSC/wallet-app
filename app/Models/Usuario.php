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
use App\Http\Controllers\UsuarioController;



class Usuario extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $table = 'usuarios';

    protected $fillable = [
        'nombre',
        'email',
        'password',
        'fecha_nacimiento',
        'telefono',
        'direccion',
        'saldo_monedero',
        'foto_perfil'
    ];

    protected $hidden = [
        'contrasena'
    ];

    public function index()
    {
        $usuarios = Usuario::simplePaginate(5);
        return view('admin.usuarios.index', compact('usuarios'));
    }

    public function edit()
    {
        //recuperar el listado de roles
        $roles = Role::all();
        return view('admin.usuarios.edit', compact('usuarios', 'roles'));
    }

    public function update(Request $request, Usuario $usuario)
    {
        //llenar la tabla intermedia
        $usuario->roles()->sync($request->roles);
        return redirect()->route('usuarios.edit', $usuario)
            ->with('success-update', 'Se asignó el rol correctamente');
    }

    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect()->action([UsuarioController::class, 'index'])
            ->with('success-delete', 'Se eliminó el usuario correctamente');
    }

    public function transacciones()
    {
        return $this->hasMany(Transaccion::class);
    }

    public function participacionesSorteos()
    {
        return $this->hasMany(ParticipacionSorteo::class);
    }
}
