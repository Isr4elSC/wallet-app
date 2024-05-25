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
                'name' => 'admin.index',
                'description' => 'Ver el dashboard'
            ]
        )->syncRoles($admin, $cliente, $comercio);

        //Categories
        Permission::create(
            [
                'name' => 'categories.index',
                'description' => 'Ver listado de categorias'
            ]
        )->syncRoles($admin, $cliente, $comercio);
        Permission::create(
            [
                'name' => 'categories.create',
                'description' => 'Crear categorias'
            ]
        )->assignRole($admin);
        Permission::create(
            [
                'name' => 'categories.edit',
                'description' => 'Editar categorias'
            ]
        )->assignRole($admin);
        Permission::create(
            [
                'name' => 'categories.destroy',
                'description' => 'Eliminar categorias'
            ]
        )->assignRole($admin);

        //articles

        Permission::create(
            [
                'name' => 'articles.index',
                'description' => 'Ver listado de articulos'
            ]
        )->syncRoles($admin, $cliente, $comercio);
        Permission::create(
            [
                'name' => 'articles.create',
                'description' => 'Crear articulos'
            ]
        )->syncRoles($admin, $cliente, $comercio);
        Permission::create(
            [
                'name' => 'articles.edit',
                'description' => 'Editar articulos'
            ]
        )->syncRoles($admin, $cliente, $comercio);
        Permission::create(
            [
                'name' => 'articles.destroy',
                'description' => 'Eliminar articulos'
            ]
        )->syncRoles($admin, $cliente, $comercio);


        //comentarios
        Permission::create(
            [
                'name' => 'comments.index',
                'description' => 'Ver listado de comentarios'
            ]
        )->syncRoles($admin, $cliente, $comercio);
        Permission::create(
            [
                'name' => 'comments.destroy',
                'description' => 'Eliminar comentarios'
            ]
        )->syncRoles($admin, $cliente, $comercio);

        //users
        Permission::create(
            [
                'name' => 'users.index',
                'description' => 'Ver listado de usuarios'
            ]
        )->assignRole($admin);
        Permission::create(
            [
                'name' => 'users.edit',
                'description' => 'Editar usuarios'
            ]
        )->assignRole($admin);
        Permission::create(
            [
                'name' => 'users.destroy',
                'description' => 'Eliminar usuarios'
            ]
        )->assignRole($admin);
    }
}
