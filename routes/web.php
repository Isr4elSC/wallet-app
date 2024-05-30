<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MonederoController;
use App\Http\Controllers\ComercioController;
use App\Http\Controllers\TransaccionController;
use App\Models\Transaccion;
use Illuminate\Support\Facades\Route;
use Whoops\Run;




//Ruta de inicio
Route::get('/', function () {
    return view('welcome');
})->name('inicio');


//Rutas de la aplicacion
// Route::view('/inicio', 'inicio')->name('inicio');
Route::view('/admin', 'admin.index')->name('admin')->middleware('auth')->middleware('can:admin');


//Usuarios
// Route::get('/users', [UserController::class, 'index'])->name('users.index');
// Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
// Route::get('/users/{user}', [UserController::class, 'show'])->name('user.show');
// Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
// Route::patch('/users/{user}', [UserController::class, 'update'])->name('user.update');
// route::delete('/users/{user}', [UserController::class, 'destroy'])->name('user.destroy');
// Route::post('/users', [UserController::class, 'store'])->name('user.store');
Route::resource('/admin/users', UserController::class)
    ->names('users')
    // ->parameters(['users' => 'user'])
    // ->except('create', 'store', 'show')
    ->middleware('auth')
    ->middleware('can:manage-users');

//Monederos
Route::get('/admin/monederos', [MonederoController::class, 'index'])->name('monederos.index')->middleware('auth')->middleware('can:manage-monederos');
Route::get('/admin/monederos/create', [MonederoController::class, 'create'])->name('monederos.create')->middleware('auth')->middleware('can:manage-monederos');
Route::get('/admin/monederos/{monedero}', [MonederoController::class, 'show'])->name('monederos.show')->middleware('auth')->middleware('can:manage-monederos');
Route::get('/admin/monederos/{monedero}/edit', [MonederoController::class, 'edit'])->name('monederos.edit')->middleware('auth')->middleware('can:manage-monederos');
Route::patch('/admin/monederos/{monedero}', [MonederoController::class, 'update'])->name('monederos.update')->middleware('auth')->middleware('can:manage-monederos');
route::delete('/admin/monederos/{monedero}', [MonederoController::class, 'destroy'])->name('monederos.destroy')->middleware('auth')->middleware('can:manage-monederos');
Route::post('/admin/monederos/', [MonederoController::class, 'store'])->name('monederos.store')->middleware('auth')->middleware('can:manage-monederos');

Route::get('/user/monedero/{user}', [MonederoController::class, 'monederoUser'])->name('monedero.user')->middleware('auth');
Route::get('/user/comercios/{user}', [ComercioController::class, 'comerciosUser'])->name('comercio.user')->middleware('auth');
Route::get('/user/transaccion/create', [TransaccionController::class, 'create'])->name('transaccion.create')->middleware('auth')->middleware('can:crear-transacciones');

//Transacciones
Route::get('/admin/transacciones', [TransaccionController::class, 'index'])->name('transacciones.index')->middleware('auth')->middleware('can:manage-transacciones');
Route::get('/admin/transacciones/create', [TransaccionController::class, 'create'])->name('transacciones.create')->middleware('auth')->middleware('can:manage-transacciones');
Route::get('/admin/transacciones/{transaccion}', [TransaccionController::class, 'show'])->name('transacciones.show')->middleware('auth')->middleware('can:manage-transacciones');
Route::get('/admin/transacciones/{transaccion}/edit', [TransaccionController::class, 'edit'])->name('transacciones.edit')->middleware('auth')->middleware('can:manage-transacciones');
Route::patch('/admin/transacciones/{transaccion}', [TransaccionController::class, 'update'])->name('transacciones.update')->middleware('auth')->middleware('can:manage-transacciones');
Route::delete('/admin/transacciones/{transaccion}', [TransaccionController::class, 'destroy'])->name('transacciones.destroy')->middleware('auth')->middleware('can:manage-transacciones');


//Comercios
// Route::get('/comercios', [ComercioController::class, 'index'])->name('comercios.index');
// Route::get('/comercios', [ComercioController::class, 'index'])->name('comercios.show');
// Route::get('/comercios', [ComercioController::class, 'index'])->name('comercios.edit');
// Route::get('/comercios', [ComercioController::class, 'index'])->name('comercios.update');
// Route::get('/comercios', [ComercioController::class, 'index'])->name('comercios.destroy');

//ADMINISTRADOR
// Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

Route::resource('/admin/comercios', ComercioController::class)
    ->names('comercios')
    ->middleware('auth')
    ->middleware('can:manage-comercios');

Route::resource('/admin/sorteos', ComercioController::class)
    ->names('sorteos')
    ->middleware('auth')
    ->middleware('can:manage-sorteos');

Route::resource('/admin/promociones', ComercioController::class)
    ->names('promociones')
    ->middleware('auth')
    ->middleware('can:manage-promociones');


//Rutas de autenticacion
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//Rutas de perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//Usuarios
// Route::resource('users', 'UserController')
//     ->except('create', 'store', 'show')
//     ->names('users');

require __DIR__ . '/auth.php';
