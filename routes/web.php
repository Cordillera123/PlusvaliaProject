<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

// Ruta para el dashboard sin middleware de autenticación
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Redirigir la ruta '/' a la vista de login
Route::get('/', function () {
    return redirect()->route('login'); // Redirigir a login
});

// Rutas para login y logout
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
