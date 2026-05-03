<?php

use App\Http\Controllers\AsistenciaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeportistaController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VentaController;


Route::get('/', fn() => redirect()->route('dashboard'));

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'role:admin'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::resource('deportistas', DeportistaController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('grupos', GrupoController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('sedes', SedeController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('productos', ProductoController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::get('asistencias', [AsistenciaController::class, 'index'])->name('asistencias.index');
    Route::get('asistencias/create', [AsistenciaController::class, 'create'])->name('asistencias.create');
    Route::post('asistencias', [AsistenciaController::class, 'store'])->name('asistencias.store');
});

Route::get('asistencias/{asistencia}', [AsistenciaController::class, 'show'])
    ->name('asistencias.show');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('ventas/create', [VentaController::class, 'create'])->name('ventas.create');
    Route::post('ventas', [VentaController::class, 'store'])->name('ventas.store');
});

Route::get('ventas', [VentaController::class, 'index'])->name('ventas.index');
Route::get('ventas/{venta}', [VentaController::class, 'show'])->name('ventas.show');
