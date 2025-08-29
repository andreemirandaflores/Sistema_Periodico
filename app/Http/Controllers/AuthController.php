<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Mostrar formulario (login/registro)
    public function showForm(Request $request)
    {
        $action = $request->query('action', 'login'); // por defecto login
        return view('auth.auth', compact('action'));
    }

    // Procesar login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
    $request->session()->regenerate();
    return redirect()->route('dashboard'); // Esto ya seleccionará la vista correcta
}


        return back()->withErrors([
            'email' => 'Credenciales incorrectas.',
        ]);
    }

    // Procesar registro
    public function register(Request $request)
    {
        $data = $request->validate([
            'Nombre' => 'required|string|max:50',
            'Apellido' => 'required|string|max:50',
            'email' => 'required|email|unique:personals,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $personal = Personal::create([
            'Nombre' => $data['Nombre'],
            'Apellido' => $data['Apellido'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'CodCargo' => 4, // asignamos automáticamente el cargo "Cliente"
        ]);


        Auth::login($personal);

        return redirect('/auth')->with('success', 'Registro exitoso. Por favor, inicia sesión.');

    }

    public function form()
    {
        return view('auth.auth'); // tu Blade se llama auth.blade.php
    }

    // Logout
public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('auth.form');
}


}
