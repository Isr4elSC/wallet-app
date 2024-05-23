<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Whoops\Run;




//Ruta de inicio
Route::get('/', function () {
    return view('welcome');
});


//Rutas de ejemplo
//personal site.com => /inicio
Route::view('/inicio', 'inicio')->name('inicio');
//personal site.com/contacto => /contacto
Route::view('/contacto', 'contacto')->name('contacto');
//personal site.com/blog => /blog
// Route::view('/blog', 'blog')->name('blog');
Route::get('/blog', [PostController::class, 'index'])->name('blog');
//personal site.com/about => /about
Route::view('/about', 'about')->name('about');


//ADMINISTRADOR
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

//CATEGORIAS

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
