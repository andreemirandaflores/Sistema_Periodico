<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('auth.form'); // Redirige al login/registro
});

// Formulario único (login o registro)
Route::get('/auth', [AuthController::class, 'form'])->name('auth.form'); // Mostrar formulario
Route::post('/auth/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth/register', [AuthController::class, 'register'])->name('register');


// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Dashboard protegido
Route::get('/dashboard', function () {
    $user = Auth::user();
    if (!$user) {
        return redirect()->route('auth.form');
    }

    $cargo = $user->cargo->NombreCargo;

    switch ($cargo) {
        case 'Administrador':
            return view('dashboard.admin');
        case 'Vendedor':
            return view('dashboard.vendedor');
        case 'Producción':
            return view('dashboard.produccion');
        case 'Cliente':
            return view('dashboard.cliente');
        default:
            return "No hay vista disponible para este cargo";
    }
})->name('dashboard'); // ← aquí es crucial



Route::get('/profile/edit', function() {
    return "Aquí irá la edición de perfil";
})->name('profile.edit');
