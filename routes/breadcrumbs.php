<?php

use App\Models\User;
use App\Models\Monedero;
use App\Models\Transaccion;
use App\Models\Comercio;
use App\Models\Promocion;
use App\Models\Sorteo;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('users.index', function (BreadcrumbTrail $trail): void {
    $trail->push('Administración', route('dashboard'));
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
    $trail->push('Administración', route('dashboard'));
    $trail->push('Monederos', route('monederos.index'));
});

Breadcrumbs::for('monederos.show', function (BreadcrumbTrail $trail, Monedero $monedero): void {
    $trail->parent('monederos.index');
    $trail->push($monedero->user->nombre, route('monederos.show', $monedero));
});

Breadcrumbs::for('monederos.edit', function (BreadcrumbTrail $trail, Monedero $monedero): void {
    $trail->parent('monederos.show', $monedero);
    $trail->push('Editar', route('monederos.edit', $monedero));
});

Breadcrumbs::for('monederos.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('monederos.index');
    $trail->push('Nuevo', route('monederos.create'));
});

Breadcrumbs::for('transacciones.index', function (BreadcrumbTrail $trail): void {
    $trail->push('Administración', route('dashboard'));
    $trail->push('Transacciones', route('transacciones.index'));
});

Breadcrumbs::for('transacciones.show', function (BreadcrumbTrail $trail, Transaccion $transaccion): void {
    $trail->parent('transacciones.index');
    $trail->push($transaccion->id, route('transacciones.show', $transaccion));
});

Breadcrumbs::for('transacciones.edit', function (BreadcrumbTrail $trail, Transaccion $transaccion): void {
    $trail->parent('transacciones.show', $transaccion);
    $trail->push('Editar', route('transacciones.edit', $transaccion));
});

Breadcrumbs::for('transacciones.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('transacciones.index');
    $trail->push('Nueva', route('transacciones.create'));
});

Breadcrumbs::for('comercios.index', function (BreadcrumbTrail $trail): void {
    $trail->push('Administración', route('dashboard'));
    $trail->push('Comercios', route('comercios.index'));
});

Breadcrumbs::for('comercios.show', function (BreadcrumbTrail $trail, Comercio $comercio): void {
    $trail->parent('comercios.index');
    $trail->push($comercio->nombre, route('comercios.show', $comercio));
});

Breadcrumbs::for('comercios.edit', function (BreadcrumbTrail $trail, Comercio $comercio): void {
    $trail->parent('comercios.show', $comercio);
    $trail->push('Editar', route('comercios.edit', $comercio));
});

Breadcrumbs::for('comercios.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('comercios.index');
    $trail->push('Nuevo', route('comercios.create'));
});

Breadcrumbs::for('promociones.index', function (BreadcrumbTrail $trail): void {
    $trail->push('Administración', route('dashboard'));
    $trail->push('Promociones', route('promociones.index'));
});

Breadcrumbs::for('promociones.show', function (BreadcrumbTrail $trail, Promocion $promocion): void {
    $trail->parent('comercios.index');
    $trail->push($promocion->nombre, route('comercios.show', $promocion));
});

Breadcrumbs::for('promociones.edit', function (BreadcrumbTrail $trail, Promocion $promocion): void {
    $trail->parent('comercios.show', $promocion);
    $trail->push('Editar', route('promociones.edit', $promocion));
});

Breadcrumbs::for('promociones.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('comercios.index');
    $trail->push('Nueva', route('promociones.create'));
});

Breadcrumbs::for('sorteos.index', function (BreadcrumbTrail $trail): void {
    $trail->push('Administración', route('dashboard'));
    $trail->push('Sorteos', route('sorteos.index'));
});

Breadcrumbs::for('sorteos.show', function (BreadcrumbTrail $trail, Sorteo $sorteo): void {
    $trail->parent('sorteos.index');
    $trail->push($sorteo->nombre, route('sorteos.show', $sorteo));
});

Breadcrumbs::for('sorteos.edit', function (BreadcrumbTrail $trail, Sorteo $sorteo): void {
    $trail->parent('sorteos.show', $sorteo);
    $trail->push('Editar sorteo', route('sorteos.edit', $sorteo));
});

Breadcrumbs::for('sorteos.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('sorteos.index');
    $trail->push('Nueva promoción', route('sorteos.create'));
});

Breadcrumbs::for('admin', function (BreadcrumbTrail $trail): void {
    $trail->push('Administración', route('dashboard'));
});

Breadcrumbs::for('monedero-usuario', function (BreadcrumbTrail $trail, Monedero $monedero): void {
    $trail->push('Monedero', route('monedero-usuario', $monedero));
});

Breadcrumbs::for('comercio-usuario', function (BreadcrumbTrail $trail, Comercio $comercio): void {
    $trail->push('Comercio', route('comercio-usuario', $comercio));
});

Breadcrumbs::for('venta-create', function (BreadcrumbTrail $trail, Comercio $comercio): void {
    $trail->parent('comercio-usuario', $comercio);
    $trail->push('realizar venta', route('venta-create', $comercio));
});
