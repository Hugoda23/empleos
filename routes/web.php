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

// Rutas públicas
Route::get('/', [WebController::class, 'index'])->name('index');

// Rutas de autenticación
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Rutas para administrador
Route::prefix('admin')->middleware(['auth', 'redireccion.rol:Administrador'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/empresas', [EmpresaController::class, 'index'])->name('admin.empresas.index');
    Route::get('/empresas/create', [EmpresaController::class, 'create'])->name('admin.empresas.create');
    Route::post('/empresas', [EmpresaController::class, 'store'])->name('admin.empresas.store');
    Route::get('/empresas/{empresa}/edit', [EmpresaController::class, 'edit'])->name('admin.empresas.edit');
    Route::put('/empresas/{empresa}', [EmpresaController::class, 'update'])->name('admin.empresas.update');
    Route::delete('/empresas/{empresa}', [EmpresaController::class, 'destroy'])->name('admin.empresas.destroy');
    Route::get('/graficos', [GraficosController::class, 'index'])->name('admin.graficos.index');
    Route::get('/ajustes', [AjustesController::class, 'index'])->name('admin.ajustes.index');
    Route::put('/ajustes', [AjustesController::class, 'update'])->name('admin.ajustes.update');
    Route::get('/vacantes', [VacanteController::class, 'index'])->name('admin.vacantes');
    Route::get('/solicitudes', [SolicitudController::class, 'index'])->name('admin.solicitudes.index');
    Route::get('/notificaciones', [NotificacionController::class, 'index'])->name('admin.notificaciones.index');
    Route::get('/empleos-publicados', [VacanteController::class, 'publicados'])->name('admin.empleos_publicados.index');
    Route::get('/notificaciones-empresas', [NotificacionesEmpresaController::class, 'index'])->name('admin.notificaciones_empresas.index');
     Route::get('/estado-vacantes', [EstadoVacantesController::class, 'index'])->name('admin.estado_vacantes.index');
     Route::get('/empleos', [EmpleosController::class, 'index'])->name('admin.empleos.index');
     Route::get('/empresas-usuarios', [EmpresasUsuariosController::class, 'index'])->name('admin.empresas_usuarios.index');
});

// Rutas para reclutador
Route::prefix('dashboard')->middleware(['auth', 'redireccion.rol:Reclutador'])->group(function () {
    Route::get('/empleos-publicados', [VacanteController::class, 'publicados'])->name('dashboard.empleos_publicados.index');
    Route::get('/empleos-publicados/create', [VacanteController::class, 'create'])->name('dashboard.empleos_publicados.create');
    Route::post('/empleos-publicados', [VacanteController::class, 'store'])->name('dashboard.empleos_publicados.store');
    Route::get('/empleos-publicados/{id}/edit', [VacanteController::class, 'edit'])->name('dashboard.empleos_publicados.edit');
    Route::put('/empleos-publicados/{id}', [VacanteController::class, 'update'])->name('dashboard.empleos_publicados.update');
    Route::delete('/empleos-publicados/{vacante}', [VacanteController::class, 'destroy'])->name('dashboard.empleos_publicados.destroy');
    Route::get('/solicitudes', [SolicitudController::class, 'index'])->name('dashboard.solicitudes.index');
    Route::get('/notificaciones', [NotificacionesEmpresaController::class, 'index'])->name('dashboard.notificaciones.index');
});

// Rutas para candidato
Route::prefix('dashboard')->middleware(['auth', 'redireccion.rol:Candidato'])->group(function ()  {
    Route::get('/empleos', [EmpleosController::class, 'index'])->name('dashboard.empleos.index');
    Route::get('/empleos/{id}', [EmpleosController::class, 'show'])->name('dashboard.empleos.show');
    Route::get('/empresas', [EmpresasUsuariosController::class, 'index'])->name('dashboard.empresas.index');
    Route::get('/empresas/{id}', [EmpresasUsuariosController::class, 'show'])->name('dashboard.empresas.show');
    Route::get('/notificaciones', [NotificacionesUsuariosController::class, 'index'])->name('dashboard.notificaciones.index');
    Route::get('/solicitudes', [SolicitudesUsuariosController::class, 'index'])->name('dashboard.solicitudes.index');
});


 Route::get('/admin/empleos', [EmpleosController::class, 'index'])->name('admin.empleos.index');
 Route::get('/admin/empleos/{id}', [EmpleosController::class, 'show'])->name('admin.empleos.show');
 Route::get('/admin/empresas_usuarios', [EmpresasUsuariosController::class, 'index'])->name('admin.empresas_usuarios.index');
 Route::get('/admin/empresas_usuarios/{id}', [EmpresasUsuariosController::class, 'show'])->name('admin.empresas_usuarios.show');
 Route::get('/admin/notificaciones-usuarios', [NotificacionesUsuariosController::class, 'index'])->name('admin.notificaciones_usuarios.index');
 Route::put('/admin/notificaciones-usuarios/{id}/leido', [NotificacionesUsuariosController::class, 'marcarLeido'])->name('admin.notificaciones_usuarios.marcarLeido');
 Route::delete('/admin/notificaciones-usuarios/{id}', [NotificacionesUsuariosController::class, 'destroy'])->name('admin.notificaciones_usuarios.destroy');
 Route::get('/admin/solicitudes_usuarios', [SolicitudesUsuariosController::class, 'index'])->name('admin.solicitudes_usuarios.index');

// ajustes
     Route::get('/admin/ajustes', [AjustesController::class, 'index'])->name('admin.ajustes.index');
     Route::put('/admin/ajustes', [AjustesController::class, 'update'])->name('admin.ajustes.update');

