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
Route::get('/', function () {
    return view('welcome');
});


//Rutas de la aplicacion
Route::view('/inicio', 'inicio')->name('inicio');

Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show');
Route::get('/monederos', [MonederoController::class, 'index'])->name('monederos');
// Route::get('monederos/{$monedero}', [MonederoController::class, 'index'])->name('monedero.show');
Route::get('/transacciones', [TransaccionController::class, 'index'])->name('transacciones');
// Route::get('transacciones/{$transaccion}', [TransaccionController::class, 'index'])->name('transacciones.index');
Route::get('/comercios', [ComercioController::class, 'index'])->name('comercios');
// Route::get('comercios/{$comercio}', [ComercioController::class, 'index'])->name('comercios.show');


//ADMINISTRADOR
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');


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
Route::resource('users', 'UserController')
    ->except('create', 'store', 'show')
    ->names('users');

require __DIR__ . '/auth.php';
