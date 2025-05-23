<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\VacanteController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\GraficosController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\NotificacionesEmpresaController;
use App\Http\Controllers\EstadoVacantesController;
use App\Http\Controllers\EmpleosController;
use App\Http\Controllers\EmpresasUsuariosController;
use App\Http\Controllers\NotificacionesUsuariosController;
use App\Http\Controllers\SolicitudesUsuariosController;
use App\Http\Controllers\AjustesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Página principal
Route::get('/', [WebController::class, 'index'])->name('index');

// Registro (sin protección)
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
// Rutas de autenticación
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

//rutas admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/vacantes', [VacanteController::class, 'index'])->name('admin.vacantes');
Route::get('/admin/empresas', [EmpresaController::class, 'index'])->name('admin.empresas.index');
Route::get('/admin/empresas/create', [EmpresaController::class, 'create'])->name('admin.empresas.create');
Route::post('/admin/empresas', [EmpresaController::class, 'store'])->name('admin.empresas.store');
Route::get('/admin/empresas/{empresa}/edit', [EmpresaController::class, 'edit'])->name('admin.empresas.edit');
Route::put('/admin/empresas/{empresa}', [EmpresaController::class, 'update'])->name('admin.empresas.update');
Route::delete('/admin/empresas/{empresa}', [EmpresaController::class, 'destroy'])->name('admin.empresas.destroy');
Route::get('/admin/notificaciones', [NotificacionController::class, 'index'])->name('admin.notificaciones.index');
Route::put('/admin/notificaciones/{id}/marcar-leida', [NotificacionController::class, 'marcarLeida'])->name('admin.notificaciones.marcarLeida');
Route::get('/admin/graficos', [GraficosController::class, 'index'])->name('admin.graficos.index');

//rutas empresas
Route::get('/admin/empleos-publicados', [VacanteController::class, 'publicados'])->name('admin.empleos_publicados.index');
Route::get('/admin/empleos-publicados/create', [VacanteController::class, 'create'])->name('admin.empleos_publicados.create');
Route::post('/admin/empleos-publicados', [VacanteController::class, 'store'])->name('admin.empleos_publicados.store');
Route::get('/admin/empleos-publicados/{id}/edit', [VacanteController::class, 'edit'])->name('admin.empleos_publicados.edit');
Route::put('/admin/empleos-publicados/{id}', [VacanteController::class, 'update'])->name('admin.empleos_publicados.update');
Route::delete('/admin/empleos-publicados/{vacante}', [VacanteController::class, 'destroy'])->name('admin.empleos_publicados.destroy');
Route::get('/admin/solicitudes', [SolicitudController::class, 'index'])->name('admin.solicitudes.index');
Route::get('/solicitudes', [SolicitudController::class, 'index'])->name('solicitudes.index');
Route::delete('/solicitudes/{id}', [SolicitudController::class, 'destroy'])->name('solicitudes.destroy');
Route::post('/solicitudes/{id}/mensaje', [SolicitudController::class, 'enviarMensaje'])->name('solicitudes.enviarMensaje');
Route::get('/admin/notificaciones-empresas', [NotificacionesEmpresaController::class, 'index'])->name('admin.notificaciones_empresas.index');
Route::get('/admin/estado-vacantes', [EstadoVacantesController::class, 'index'])->name('admin.estado_vacantes.index');




//rutas para usuarios
Route::get('/admin/empleos', [EmpleosController::class, 'index'])->name('admin.empleos.index');
Route::get('/admin/empleos/{id}', [EmpleosController::class, 'show'])->name('admin.empleos.show');
Route::get('/admin/empresas_usuarios', [EmpresasUsuariosController::class, 'index'])->name('admin.empresas_usuarios.index');
Route::get('/admin/empresas_usuarios/{id}', [EmpresasUsuariosController::class, 'show'])->name('admin.empresas_usuarios.show');
Route::get('/admin/notificaciones-usuarios', [NotificacionesUsuariosController::class, 'index'])->name('admin.notificaciones_usuarios.index');
Route::put('/admin/notificaciones-usuarios/{id}/leido', [NotificacionesUsuariosController::class, 'marcarLeido'])->name('admin.notificaciones_usuarios.marcarLeido');
Route::delete('/admin/notificaciones-usuarios/{id}', [NotificacionesUsuariosController::class, 'destroy'])->name('admin.notificaciones_usuarios.destroy');
Route::get('/admin/solicitudes_usuarios', [SolicitudesUsuariosController::class, 'index'])->name('admin.solicitudes_usuarios.index');

//ajustes
    Route::get('/admin/ajustes', [AjustesController::class, 'index'])->name('admin.ajustes.index');
    Route::put('/admin/ajustes', [AjustesController::class, 'update'])->name('admin.ajustes.update');

