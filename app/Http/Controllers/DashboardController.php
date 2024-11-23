<?php
// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Muestra el dashboard solo si el usuario es admin
    public function index()
    {
        // Verificar si el usuario está autenticado y es admin
        if (Auth::check() && Auth::user()->roles->contains('name', 'admin')) {
            return view('admin.dashboard'); // Vista del dashboard para admin
        }

        // Si no está autenticado o no es admin, redirigir al login
        return redirect()->route('login')->with('error', 'Acceso denegado. Solo los administradores pueden acceder.');
    }
}
