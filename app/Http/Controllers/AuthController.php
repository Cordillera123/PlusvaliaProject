<?php
// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // Mostrar el formulario de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Método para autenticar al usuario
    public function login(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Intentar autenticar al usuario
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();  // Obtener el usuario autenticado

            // Verificar si el usuario tiene el rol de 'admin'
            if ($user && $user->roles->contains('name', 'Admin')) {
                // Si es admin, redirigir al dashboard
                return redirect()->route('dashboard');
            }

            // Si el usuario no es admin, cerrar sesión y redirigir
            Auth::logout();
            return redirect()->route('login')->with('error', 'Acceso denegado. Solo los administradores pueden ingresar.');
        }

        // Si las credenciales son incorrectas, volver con el error
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }

    // Método para cerrar sesión
    public function logout()
    {
        Auth::logout();  // Cerrar sesión
        return redirect()->route('login');  // Redirigir al login
    }
}
