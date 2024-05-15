<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//autenticacion
Route::get('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'authenticate'])->name('login.post');
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

// Registro de usuario
Route::get('/registro', [App\Http\Controllers\RegistroUsuarioController::class, 'registro'])->name('registro');
Route::post('/registro', [App\Http\Controllers\RegistroUsuarioController::class, 'registrarUsuario'])->name('registro.post');

// Usuarios
Route::middleware('auth')->group(function () {
    Route::get('/perfil', [App\Http\Controllers\UsuarioController::class, 'perfil'])->name('perfil');
    Route::post('/perfil/actualizar', [App\Http\Controllers\UsuarioController::class, 'actualizarPerfil'])->name('perfil.actualizar');
    Route::post('/perfil/recargar', [App\Http\Controllers\UsuarioController::class, 'recargarMonedero'])->name('perfil.recargar');
    Route::get('/transacciones', [App\Http\Controllers\UsuarioController::class, 'transacciones'])->name('transacciones');
    Route::get('/sorteos/participar/{id}', [App\Http\Controllers\UsuarioController::class, 'participarSorteo'])->name('sorteos.participar');
});

// Comercios
Route::middleware('auth')->group(function () {
    Route::get('/comercio/perfil', [App\Http\Controllers\ComercioController::class, 'perfil'])->name('comercio.perfil');
    Route::post('/comercio/perfil/actualizar', [App\Http\Controllers\ComercioController::class, 'actualizarPerfil'])->name('comercio.perfil.actualizar');
    Route::get('/comercio/transacciones', [App\Http\Controllers\ComercioController::class, 'transacciones'])->name('comercio.transacciones');
    Route::get('/comercio/sorteos', [App\Http\Controllers\ComercioController::class, 'sorteos'])->name('comercio.sorteos');
    Route::get('/comercio/sorteos/crear', [App\Http\Controllers\SorteoController::class, 'crearSorteo'])->name('comercio.sorteos.crear');
    Route::post('/comercio/sorteos/crear', [App\Http\Controllers\SorteoController::class, 'guardarSorteo'])->name('comercio.sorteos.guardar');
    Route::get('/comercio/sorteos/editar/{id}', [App\Http\Controllers\SorteoController::class, 'editarSorteo'])->name('comercio.sorteos.editar');
    Route::post('/comercio/sorteos/editar/{id}', [App\Http\Controllers\SorteoController::class, 'actualizarSorteo'])->name('comercio.sorteos.actualizar');
    Route::get('/comercio/sorteos/eliminar/{id}', [App\Http\Controllers\SorteoController::class, 'eliminarSorteo'])->name('comercio.sorteos.eliminar');
});

//sorteos
Route::get('/sorteos', [App\Http\Controllers\SorteoController::class, 'listarSorteos'])->name('sorteos');
Route::get('/sorteos/{id}', [App\Http\Controllers\SorteoController::class, 'verSorteo'])->name('sorteos.ver');


// Transacciones
Route::post('/transacciones/compra', [App\Http\Controllers\TransaccionController::class, 'realizarCompra'])->name('transacciones.compra');
Route::post('/transacciones/recarga', [App\Http\Controllers\TransaccionController::class, 'realizarRecarga'])->name('transacciones.recarga');
Route::get('/saldo', [App\Http\Controllers\SaldoController::class, 'obtenerSaldo'])->name('saldo');
Route::get('/historial', [App\Http\Controllers\HistorialController::class, 'obtenerHistorial'])->name('historial');
