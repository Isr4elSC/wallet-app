<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MonederoController;
use App\Http\Controllers\ComercioController;
use App\Http\Controllers\TransaccionController;
use App\Http\Controllers\SorteoController;
use App\Http\Controllers\PromocionController;
use App\Http\Controllers\VentaController;
use Illuminate\Support\Facades\Route;


//Ruta de inicio
Route::get('/', function () {
    return view('welcome');
})->name('inicio');
// Route::view('/inicio', 'inicio')->name('inicio');


//ADMINISTRACION

// Route::view('/admin', 'admin')->name('admin')->middleware('auth')->middleware('can:admin');

//Rutas de autenticacion
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Rutas para la administracion de Usuarios
Route::resource('/admin/users', UserController::class)
    ->names('users')
    ->middleware('auth')
    ->middleware('can:manage-users');

//Rutas para la administración de Monederos
Route::get('/admin/monederos', [MonederoController::class, 'index'])->name('monederos.index')->middleware('auth')->middleware('can:manage-monederos');
Route::get('/admin/monederos/create', [MonederoController::class, 'create'])->name('monederos.create')->middleware('auth')->middleware('can:manage-monederos');
Route::get('/admin/monederos/{monedero}', [MonederoController::class, 'show'])->name('monederos.show')->middleware('auth')->middleware('can:manage-monederos');
Route::get('/admin/monederos/{monedero}/edit', [MonederoController::class, 'edit'])->name('monederos.edit')->middleware('auth')->middleware('can:manage-monederos');
Route::patch('/admin/monederos/{monedero}', [MonederoController::class, 'update'])->name('monederos.update')->middleware('auth')->middleware('can:manage-monederos');
route::delete('/admin/monederos/{monedero}', [MonederoController::class, 'destroy'])->name('monederos.destroy')->middleware('auth')->middleware('can:manage-monederos');
Route::post('/admin/monederos/', [MonederoController::class, 'store'])->name('monederos.store')->middleware('auth')->middleware('can:manage-monederos');

//Administración de Transacciones
Route::get('/admin/transacciones', [TransaccionController::class, 'index'])->name('transacciones.index')->middleware('auth')->middleware('can:manage-transacciones');
Route::get('/admin/transacciones/create', [TransaccionController::class, 'create'])->name('transacciones.create')->middleware('auth')->middleware('can:manage-transacciones');
Route::get('/admin/transacciones/{transaccion}', [TransaccionController::class, 'show'])->name('transacciones.show')->middleware('auth')->middleware('can:manage-transacciones');
Route::get('/admin/transacciones/{transaccion}/edit', [TransaccionController::class, 'edit'])->name('transacciones.edit')->middleware('auth')->middleware('can:manage-transacciones');
Route::patch('/admin/transacciones/{transaccion}', [TransaccionController::class, 'update'])->name('transacciones.update')->middleware('auth')->middleware('can:manage-transacciones');
Route::delete('/admin/transacciones/{transaccion}', [TransaccionController::class, 'destroy'])->name('transacciones.destroy')->middleware('auth')->middleware('can:manage-transacciones');
Route::post('/admin/transacciones/', [TransaccionController::class, 'store'])->name('transacciones.store')->middleware('auth')->middleware('can:manage-transacciones');

//Rutas para la administración de Comercios
Route::get('/admin/comercios', [ComercioController::class, 'index'])->name('comercios.index')->middleware('auth')->middleware('can:manage-comercios');
Route::get('/admin/comercios/create', [ComercioController::class, 'create'])->name('comercios.create')->middleware('auth')->middleware('can:manage-comercios');
Route::get('/admin/comercios/{comercio}', [ComercioController::class, 'show'])->name('comercios.show')->middleware('auth')->middleware('can:manage-comercios');
Route::get('/admin/comercios/{comercio}/edit', [ComercioController::class, 'edit'])->name('comercios.edit')->middleware('can:manage-comercios');
Route::patch('/admin/comercios/{comercio}', [ComercioController::class, 'update'])->name('comercios.update')->middleware('can:manage-comercios');
route::delete('/admin/comercios/{comercio}', [ComercioController::class, 'destroy'])->name('comercios.destroy')->middleware('auth')->middleware('can:manage-comercios');
Route::post('/admin/comercios/', [ComercioController::class, 'store'])->name('comercios.store')->middleware('can:manage-comercios');

//Rutas para la administración de Sorteos
Route::resource('/admin/sorteos', SorteoController::class)
    ->names('sorteos')
    ->middleware('auth')
    ->middleware('can:manage-sorteos');

//Rutas para la administración de Promociones
Route::resource('/admin/promociones', PromocionController::class)
    ->names('promociones')
    ->middleware('auth')
    ->middleware('can:manage-promociones');

//Rutas para visualizar el monedero del usuario
Route::get('/user/monedero/', [MonederoController::class, 'acceder'])->name('monedero.usuario')->middleware('auth')->middleware('can:usar-monedero');
Route::patch('/user/monedero/rechazar/', [MonederoController::class, 'rechazarPago'])->name('venta.rechazar')->middleware('auth')->middleware('can:rechazar-compras');
Route::patch('/user/monedero/pagar/', [MonederoController::class, 'aceptarPago'])->name('venta.pagar')->middleware('auth')->middleware('can:realizar-compras');

//Rutas para visualizar los comercios del usuario
Route::get('/user/comercio/', [ComercioController::class, 'acceder'])->name('comercio.usuario')->middleware('auth')->middleware('can:crear-comercio');
Route::get('/user/comercio/nuevo', [ComercioController::class, 'iniciar'])->name('comercio.iniciar')->middleware('auth')->middleware('can:crear-comercio');
Route::post('/user/comercio/edit', [ComercioController::class, 'crearComercio'])->name('comercio.create')->middleware('auth')->middleware('can:usar-comercios');
Route::post('/user/comercio/', [ComercioController::class, 'crearComercio'])->name('comercio.store')->middleware('auth')->middleware('can:usar-comercios');

//Rutas para visualizar las ventas del comercio
Route::get('/user/comercio/ventas/', [VentaController::class, 'index'])->name('ventas.index')->middleware('auth')->middleware('can:realizar-ventas');
Route::get('/user/comercio/ventas/nueva-venta/', [VentaController::class, 'create'])->name('ventas.create')->middleware('auth')->middleware('can:realizar-ventas');
Route::get('/user/comercio/ventas/{venta}', [VentaController::class, 'show'])->name('ventas.show')->middleware('auth')->middleware('can:realizar-ventas');
Route::get('/user/comercio/ventas/{venta}/editar', [VentaController::class, 'edit'])->name('ventas.edit')->middleware('auth')->middleware('can:realizar-ventas');
Route::patch('/user/comercio/ventas/{venta}', [VentaController::class, 'update'])->name('ventas.update')->middleware('auth')->middleware('can:realizar-ventas');
Route::post('/user/comercio/ventas/', [VentaController::class, 'store'])->name('ventas.store')->middleware('auth')->middleware('can:realizar-ventas');
Route::delete('/user/comercio/ventas/{venta}', [VentaController::class, 'destroy'])->name('ventas.destroy')->middleware('auth')->middleware('can:realizar-ventas');

//Rutas de perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
