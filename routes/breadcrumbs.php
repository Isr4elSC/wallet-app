<?php

use App\Models\User;
use App\Models\Monedero;
use App\Models\Transaccion;
use App\Models\Comercio;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('users.index', function (BreadcrumbTrail $trail): void {
    $trail->push('Administración', route('admin'));
    $trail->push('Usuarios', route('users.index'));
});

Breadcrumbs::for('users.show', function (BreadcrumbTrail $trail, User $user): void {
    $trail->parent('users.index');
    $trail->push($user->nombre, route('users.show', $user));
});

Breadcrumbs::for('users.edit', function (BreadcrumbTrail $trail, User $user): void {
    $trail->parent('users.show', $user);
    $trail->push('Editar usuario', route('users.edit', $user));
});

Breadcrumbs::for('users.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('users.index');
    $trail->push('Nuevo usuario', route('users.create'));
});


Breadcrumbs::for('monederos.index', function (BreadcrumbTrail $trail): void {
    $trail->push('Administración', route('admin'));
    $trail->push('Monederos', route('monederos.index'));
});

Breadcrumbs::for('monederos.show', function (BreadcrumbTrail $trail, Monedero $monedero): void {
    $trail->parent('monederos.index');
    $trail->push($monedero->user->nombre, route('monederos.show', $monedero));
});

Breadcrumbs::for('monederos.edit', function (BreadcrumbTrail $trail, Monedero $monedero): void {
    $trail->parent('monederos.show', $monedero);
    $trail->push('Edit', route('monederos.edit', $monedero));
});

Breadcrumbs::for('monederos.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('monederos.index');
    $trail->push('Create', route('monederos.create'));
});

Breadcrumbs::for('transacciones.index', function (BreadcrumbTrail $trail): void {
    $trail->push('Administración', route('admin'));
    $trail->push('Transacciones', route('transacciones.index'));
});

Breadcrumbs::for('transacciones.show', function (BreadcrumbTrail $trail, Transaccion $transaccion): void {
    $trail->parent('transacciones.index');
    $trail->push($transaccion->id, route('transacciones.show', $transaccion));
});

Breadcrumbs::for('transacciones.edit', function (BreadcrumbTrail $trail, Transaccion $transaccion): void {
    $trail->parent('transacciones.show', $transaccion);
    $trail->push('Edit', route('transacciones.edit', $transaccion));
});

Breadcrumbs::for('transacciones.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('transacciones.index');
    $trail->push('Create', route('transacciones.create'));
});

Breadcrumbs::for('comercios.index', function (BreadcrumbTrail $trail): void {
    $trail->push('Administración', route('admin'));
    $trail->push('Comercios', route('comercios.index'));
});

Breadcrumbs::for('comercios.show', function (BreadcrumbTrail $trail, Comercio $comercio): void {
    $trail->parent('comercios.index');
    $trail->push($comercio->nombre, route('comercios.show', $comercio));
});

Breadcrumbs::for('comercios.edit', function (BreadcrumbTrail $trail, Comercio $comercio): void {
    $trail->parent('comercios.show', $comercio);
    $trail->push('Editar omercio', route('comercios.edit', $comercio));
});

Breadcrumbs::for('comercios.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('comercios.index');
    $trail->push('Nuevo comercio', route('comercios.create'));
});

Breadcrumbs::for('admin', function (BreadcrumbTrail $trail): void {
    $trail->push('Administración', route('admin'));
});
