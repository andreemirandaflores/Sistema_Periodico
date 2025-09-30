<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    // Registrar un cliente nuevo
    public function store(Request $request)
    {
        $request->validate([
            'NIT' => 'required|string|max:14|unique:clientes,NIT',
            'NombreCliente' => 'required|string|max:50',
            'PaternoCliente' => 'nullable|string|max:50',
            'MaternoCliente' => 'nullable|string|max:50',
            'Telefono' => 'nullable|string|max:20',
        ]);

        $cliente = Cliente::create([
            'NIT' => $request->NIT,
            'NombreCliente' => $request->NombreCliente,
            'PaternoCliente' => $request->PaternoCliente,
            'MaternoCliente' => $request->MaternoCliente,
            'Telefono' => $request->Telefono,
        ]);

        return response()->json(['success' => true, 'cliente' => $cliente]);
    }

    // Buscar cliente por NIT o nombre
    public function search(Request $request)
    {
        $query = $request->input('query');
        $clientes = Cliente::where('NIT', 'like', "%{$query}%")
            ->orWhere('NombreCliente', 'like', "%{$query}%")
            ->get();

        return response()->json(['clientes' => $clientes]);
    }
    public function autocomplete(Request $request)
{
    $term = $request->get('term'); // Lo que escribe el usuario

    $clientes = \App\Models\Cliente::where('NombreCliente', 'LIKE', "%{$term}%")
        ->orWhere('NIT', 'LIKE', "%{$term}%")
        ->get(['NIT', 'NombreCliente', 'Telefono']);

    $result = [];

    foreach ($clientes as $cliente) {
        $result[] = [
            'label' => $cliente->NIT . ' - ' . $cliente->NombreCliente,
            'nit' => $cliente->NIT,
            'nombre' => $cliente->NombreCliente,
            'telefono' => $cliente->Telefono,
        ];
    }

    return response()->json($result);
}

}
