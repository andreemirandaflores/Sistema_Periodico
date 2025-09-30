@extends('layouts.dashboard')

@section('content')
<div class="p-4">

    <h2 class="text-xl font-bold mb-4">Prueba de Venta de Aviso</h2>

    @if(session('success'))
        <div class="bg-green-200 p-2 mb-4">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="bg-red-200 p-2 mb-4">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('venta.prueba') }}">
        @csrf
        <div class="mb-2">
            <label>NIT</label>
            <input type="text" name="NIT" class="border p-1" value="123456789">
        </div>
        <div class="mb-2">
            <label>Nombre Cliente</label>
            <input type="text" name="nombre" class="border p-1" value="Nombre Prueba">
        </div>
        <div class="mb-2">
            <label>Teléfono</label>
            <input type="text" name="telefono" class="border p-1" value="12345678">
        </div>
        <div class="mb-2">
            <label>Texto Aviso</label>
            <input type="text" name="texto_aviso" class="border p-1" value="Prueba 1">
        </div>
        <div class="mb-2">
            <label>Tipo (CodTipoTransItemTrans)</label>
            <input type="number" name="tipo" class="border p-1" value="1">
        </div>
        <div class="mb-2">
            <label>Formato</label>
            <select name="formato" class="border p-1">
                <option value="Normal">Normal</option>
                <option value="Resaltado">Resaltado</option>
                <option value="Recuadro">Recuadro</option>
            </select>
        </div>
        <div class="mb-2">
            <label>Fechas (separadas por coma)</label>
            <input type="text" name="fechas" class="border p-1" value="2025-09-18,2025-09-19">
        </div>
        <div class="mb-2">
            <label>Total</label>
            <input type="number" step="0.01" name="total" class="border p-1" value="4.80">
        </div>
        <div class="mb-2">
            <label>Efectivo</label>
            <input type="number" step="0.01" name="efectivo" class="border p-1" value="10">
        </div>

        <button type="submit" class="bg-blue-500 text-white p-2">Facturar</button>
    </form>

    @if(isset($datosPrueba))
        <h3 class="text-lg font-bold mt-4">Datos que se registrarían:</h3>
        <pre class="bg-gray-100 p-2">{{ print_r($datosPrueba, true) }}</pre>
    @endif
</div>
@endsection
