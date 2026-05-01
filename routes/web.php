<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeportistaController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\ProductoController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:super_admin'])->group(function () {
    Route::get('/dashboard/admin', fn() => 'Admin');
});

Route::middleware(['auth', 'role:entrenador'])->group(function () {
    Route::get('/dashboard/entrenador', fn() => 'Entrenador');
});

Route::middleware(['auth', 'role:secretaria'])->group(function () {
    Route::get('/dashboard/secretaria', fn() => 'Secretaria');
});

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
