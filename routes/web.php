<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MonederoController;
use App\Http\Controllers\ComercioController;
use App\Http\Controllers\TransaccionController;
use Illuminate\Support\Facades\Route;
use Whoops\Run;




//Ruta de inicio
// Route::get('/', function () {
//     return view('welcome');
// })->name('inicio');
Route::view('/', 'inicio')->name('inicio');


//Rutas de la aplicacion
Route::view('/admin', 'admin')->name('admin');


//Usuarios
// Route::get('/users', [UserController::class, 'index'])->name('users.index');
// Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
// Route::get('/users/{user}', [UserController::class, 'show'])->name('user.show');
// Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
// Route::patch('/users/{user}', [UserController::class, 'update'])->name('user.update');
// route::delete('/users/{user}', [UserController::class, 'destroy'])->name('user.destroy');
// Route::post('/users', [UserController::class, 'store'])->name('user.store');
Route::resource('users', UserController::class)
    ->names('users')
    // ->parameters(['users' => 'user'])
    // ->except('create', 'store', 'show')
    ->middleware('auth')
    ->middleware('can:manage-users');

//Monederos
Route::get('/monederos', [MonederoController::class, 'index'])->name('monederos.index');
Route::get('/monederos/create', [MonederoController::class, 'create'])->name('monedero.create');
Route::get('/monederos/{monedero}', [MonederoController::class, 'show'])->name('monedero.show');
Route::get('/monederos/{monedero}/edit', [MonederoController::class, 'edit'])->name('monedero.edit');
Route::patch('/monederos/{monedero}', [MonederoController::class, 'update'])->name('monedero.update');
route::delete('/monederos/{monedero}', [MonederoController::class, 'destroy'])->name('monedero.destroy');

//Transacciones
Route::get('/transacciones', [TransaccionController::class, 'index'])->name('transacciones.index');
Route::get('/transacciones/create', [TransaccionController::class, 'create'])->name('transacciones.create');
Route::get('/transacciones/{transaccion}', [TransaccionController::class, 'show'])->name('transacciones.show');
Route::get('/transacciones/{transaccion}/edit', [TransaccionController::class, 'edit'])->name('transacciones.edit');
Route::patch('/transacciones/{transaccion}', [TransaccionController::class, 'update'])->name('transacciones.update');
Route::delete('/transacciones/{transaccion}', [TransaccionController::class, 'destroy'])->name('transacciones.destroy');


//Comercios
// Route::get('/comercios', [ComercioController::class, 'index'])->name('comercios.index');
// Route::get('/comercios', [ComercioController::class, 'index'])->name('comercios.show');
// Route::get('/comercios', [ComercioController::class, 'index'])->name('comercios.edit');
// Route::get('/comercios', [ComercioController::class, 'index'])->name('comercios.update');
// Route::get('/comercios', [ComercioController::class, 'index'])->name('comercios.destroy');

//ADMINISTRADOR
// Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

Route::resource('comercios', ComercioController::class)
    ->names('comercios')
    ->middleware('auth')
    ->middleware('can:manage-comercios');

Route::resource('sorteos', ComercioController::class)
    ->names('sorteos')
    ->middleware('auth')
    ->middleware('can:manage-sorteos');

Route::resource('promociones', ComercioController::class)
    ->names('promociones')
    ->middleware('auth')
    ->middleware('can:manage-promociones');


//Rutas de autenticacion
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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
