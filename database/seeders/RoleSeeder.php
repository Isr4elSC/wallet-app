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
        $admin = Role::create(['name' => 'Administrator']);
        $author = Role::create(['name' => 'Author']);

        //Permissions
        Permission::create(
            [
                'name' => 'admin.index',
                'description' => 'Ver el dashboard'
            ]
        )->syncRoles($admin, $author);

        //Categories
        Permission::create(
            [
                'name' => 'categories.index',
                'description' => 'Ver listado de categorias'
            ]
        )->syncRoles($admin, $author);
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
        )->syncRoles($admin, $author);
        Permission::create(
            [
                'name' => 'articles.create',
                'description' => 'Crear articulos'
            ]
        )->syncRoles($admin, $author);
        Permission::create(
            [
                'name' => 'articles.edit',
                'description' => 'Editar articulos'
            ]
        )->syncRoles($admin, $author);
        Permission::create(
            [
                'name' => 'articles.destroy',
                'description' => 'Eliminar articulos'
            ]
        )->syncRoles($admin, $author);


        //comentarios
        Permission::create(
            [
                'name' => 'comments.index',
                'description' => 'Ver listado de comentarios'
            ]
        )->syncRoles($admin, $author);
        Permission::create(
            [
                'name' => 'comments.destroy',
                'description' => 'Eliminar comentarios'
            ]
        )->syncRoles($admin, $author);
    }
}
