<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Roles 
        $admin = Role::create(['name' => 'Administrador']);
        $cliente = Role::create(['name' => 'Cliente']);
        $comercio = Role::create(['name' => 'Comercio']);


        //Permissions
        Permission::create(
            [
                'name' => 'admin',
                'description' => 'Administrar datos'
            ]
        )->syncRoles($admin);

        //Users
        // Permission::create(
        //     [
        //         'name' => 'users.index',
        //         'description' => 'Ver listado de usuarios'
        //     ]
        // )->syncRoles($admin);
        // Permission::create(
        //     [
        //         'name' => 'users.create',
        //         'description' => 'Crear usuarios'
        //     ]
        // )->assignRole($admin);
        // Permission::create(
        //     [
        //         'name' => 'users.edit',
        //         'description' => 'Editar usuarios'
        //     ]
        // )->assignRole($admin);
        // Permission::create(
        //     [
        //         'name' => 'users.destroy',
        //         'description' => 'Eliminar usuarios'
        //     ]
        // )->assignRole($admin);
        //administrar de usuarios
        Permission::create(
            [
                'name' => 'manage-users',
                'description' => 'Administrar usuarios'
            ]
        )->assignRole($admin);

        //administrador Monederos
        Permission::create(
            [
                'name' => 'manage-monederos',
                'description' => 'Administrar monederos'
            ]
        )->assignRole($admin);

        //administrar sorteos
        Permission::create(
            [
                'name' => 'manage-sorteos',
                'description' => 'Administrar sorteos'
            ]
        )->assignRole($admin);

        //administrar promociones
        Permission::create(
            [
                'name' => 'manage-promociones',
                'description' => 'Administrar promociones'
            ]
        )->assignRole($admin);

        //Administrar comercios
        Permission::create(
            [
                'name' => 'manage-comercios',
                'description' => 'Administrar comercios'
            ]
        )->assignRole($admin);

        //Administrar Transacciones
        Permission::create(
            [
                'name' => 'manage-transacciones',
                'description' => 'Administrar transacciones'
            ]
        )->syncRoles($admin);

        //Comercios
        Permission::create(
            [
                'name' => 'crear-comercio',
                'description' => 'Crear comercios'
            ]
        )->syncRoles($admin, $cliente, $comercio);
        // Permission::create(
        //     [
        //         'name' => 'comercios.edit',
        //         'description' => 'Editar comercios'
        //     ]
        // )->syncRoles($admin, $cliente, $comercio);
        // Permission::create(
        //     [
        //         'name' => 'comercios.destroy',
        //         'description' => 'Eliminar comercios'
        //     ]
        // )->syncRoles($admin, $cliente, $comercio);


        //Monederos
        // Permission::create(
        //     [
        //         'name' => 'Monederos.index',
        //         'description' => 'Ver listado de Monederos'
        //     ]
        // )->syncRoles($admin, $cliente);
        // Permission::create(
        //     [
        //         'name' => 'Monederos.destroy',
        //         'description' => 'Eliminar Monederos'
        //     ]
        // )->syncRoles($admin);

        //transacciones
        // Permission::create(
        //     [
        //         'name' => 'transacciones.index',
        //         'description' => 'Ver listado de transacciones'
        //     ]
        // )->assignRole($admin);
        // Permission::create(
        //     [
        //         'name' => 'transacciones.edit',
        //         'description' => 'Editar transacciones'
        //     ]
        // )->assignRole($admin);
        // Permission::create(
        //     [
        //         'name' => 'transacciones.destroy',
        //         'description' => 'Eliminar transacciones'
        //     ]
        // )->assignRole($admin);

        Permission::create(
            [
                'name' => 'realizar-ventas',
                'description' => 'realizar ventas'
            ]
        )->assignRole($comercio);

        Permission::create(
            [
                'name' => 'usar-comercios',
                'description' => 'Usar el apartado comercios'
            ]
        )->assignRole($comercio);

        Permission::create(
            [
                'name' => 'usar-monedero',
                'description' => 'usar el monedero'
            ]
        )->assignRole($cliente);

        Permission::create(
            [
                'name' => 'rechazar-compras',
                'description' => 'rechazar transacciones'
            ]
        )->assignRole($cliente);


        Permission::create(
            [
                'name' => 'realizar-compras',
                'description' => 'aceptar transacciones'
            ]
        )->assignRole($cliente);
    }
}
