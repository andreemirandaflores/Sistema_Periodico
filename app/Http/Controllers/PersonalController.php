<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\Cargo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PersonalController extends Controller
{
    // Mostrar todos los personales
    public function index()
{
    $personals = Personal::with('cargo')
    ->whereIn('CodCargo', [1, 2, 3])
    ->get();

    $cargos = \App\Models\Cargo::all();

    return view('dashboard.admin.gestionar_personal', compact('personals', 'cargos'));
}
public function clientes() {
    $clientes = Personal::with('cargo')
        ->where('CodCargo', 4) // solo clientes
        ->get();

    $cargos = \App\Models\Cargo::all(); // Traer todos los cargos también

    // Pasamos ambas variables a la vista
    return view('dashboard.admin.gestionar_clientes', compact('clientes', 'cargos'));
}



    // Mostrar formulario para crear nuevo personal
    public function create()
    {
        $cargos = Cargo::all();
        return view('dashboard.admin.admin.crear_personal', compact('cargos'));
    }

    // Guardar nuevo personal
    public function store(Request $request)
    {
        $request->validate([
            'Nombre' => 'required|string|max:50',
            'Apellido' => 'required|string|max:50',
            'email' => 'required|email|unique:personals,email',
            'password' => 'required|string|min:6|confirmed',
            'telefono' => 'nullable|string|max:20',
            'CodCargo' => 'required|exists:cargos,CodCargo',
        ]);

        Personal::create([
            'Nombre' => $request->Nombre,
            'Apellido' => $request->Apellido,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telefono' => $request->telefono,
            'CodCargo' => $request->CodCargo,
        ]);

        return redirect()->route('personals.index')->with('success', 'Personal creado correctamente.');
    }

    // Mostrar formulario para editar personal existente
    public function edit($id)
    {
        $personal = Personal::findOrFail($id);
        $cargos = Cargo::all();
        return view('dashboard.admin.admin.editar_personal', compact('personal', 'cargos'));
    }

    // Actualizar personal existente
    public function update(Request $request, $id)
    {
        $personal = Personal::findOrFail($id);

        $request->validate([
            'Nombre' => 'required|string|max:50',
            'Apellido' => 'required|string|max:50',
            'email' => 'required|email|unique:personals,email,' . $personal->CodPersonal . ',CodPersonal',
            'password' => 'nullable|string|min:6|confirmed',
            'telefono' => 'nullable|string|max:20',
            'CodCargo' => 'required|exists:cargos,CodCargo',
        ]);

        $personal->Nombre = $request->Nombre;
        $personal->Apellido = $request->Apellido;
        $personal->email = $request->email;
        $personal->telefono = $request->telefono;
        $personal->CodCargo = $request->CodCargo;

        if ($request->filled('password')) {
            $personal->password = Hash::make($request->password);
        }

        $personal->save();

        return redirect()->route('personals.index')->with('success', 'Personal actualizado correctamente.');
    }

    // Eliminar personal
    public function destroy($id)
    {
        $personal = Personal::findOrFail($id);
        $personal->delete();

        return redirect()->route('personals.index')->with('success', 'Personal eliminado correctamente.');
    }
}
