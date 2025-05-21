<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\WebController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UsuarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Página principal
Route::get('/', [WebController::class, 'index'])->name('index');

// Registro
Route::post('/register', [UsuarioController::class, 'store'])->name('register');

// Login y logout
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Redirección por rol (middleware personalizado)
Route::get('/redirect', function () {
    // Solo se redirige automáticamente según el rol
})->name('redirect.por.rol')->middleware('redireccion.rol');

// Rutas protegidas según el rol
Route::middleware(['auth'])->group(function () {
    
    // Ruta para administrador
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    
    // Ruta para empleador
    Route::get('/empleador', function () {
        return view('empleador.index');
    })->name('empleador.index');

    // Ruta para postulante
    Route::get('/postulante', function () {
        return view('postulante.index');
    })->name('postulante.index');
});

// Ruta opcional de inicio
Route::get('/home', function () {
    return view('home');
})->middleware('auth');

