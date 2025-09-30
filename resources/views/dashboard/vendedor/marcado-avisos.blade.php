{{-- resources/views/marcado-avisos.blade.php --}}
@extends('layouts.dashboard')

@section('content')
<style>
/* Contenedor y título */
.container {
    max-width: 900px;
    margin: auto;
    font-family: Arial, sans-serif;
}

.page-title {
    font-size: 2rem;
    color: #2c3e50;
    font-weight: bold;
    margin-bottom: 1.5rem;
}

/* Filtros */
.filter-container {
    display: flex;
    align-items: center;
    margin-bottom: 1.5rem;
    gap: 0.5rem;
}

.label {
    font-weight: 600;
}

.date-input, .date-select {
    padding: 0.4rem 0.6rem;
    border-radius: 0.5rem;
    border: 1px solid #ccc;
    font-size: 1rem;
}

.date-input {
    text-align: center;
}

.date-select {
    cursor: pointer;
}

/* Tabla de avisos */
.avisos-table {
    width: 100%;
    border-collapse: collapse;
    text-align: center;
}

.avisos-table th, .avisos-table td {
    border: 1px solid #ccc;
    padding: 0.6rem;
}

.avisos-table thead {
    background-color: #f5f5f5;
}

.avisos-table tbody tr:hover {
    background-color: #f0f8ff;
}

.avisos-table td:first-child {
    text-align: left;
    font-weight: 500;
}

/* Checkbox estilizado */
.check-style {
    width: 1.3rem;
    height: 1.3rem;
    cursor: pointer;
}

/* Alerta */
.alert {
    display: none;
    margin-top: 1rem;
    padding: 0.8rem;
    background-color: #d4edda;
    color: #155724;
    border-radius: 0.5rem;
    text-align: center;
    font-weight: 500;
}
</style>
<div class="container mt-4">
    {{-- Título --}}
    <h2 class="page-title">Avisos diarios</h2>

    {{-- Fecha actual y filtro --}}
    <div class="filter-container">
        <span class="label">Fecha día actual:</span>
        <input type="text" class="date-input" value="{{ now()->format('d/m/Y') }}" readonly>
        <select class="date-select">
            <option selected>Por Fechas</option>
            <option value="1">Ayer</option>
            <option value="2">Semana</option>
            <option value="3">Mes</option>
        </select>
    </div>

    {{-- Tabla de avisos --}}
    <table class="avisos-table">
        <thead>
            <tr>
                <th>Aviso</th>
                <th>Descargado o copiado</th>
                <th>Revisión inicial</th>
                <th>Armado</th>
                <th>Revisión final</th>
            </tr>
        </thead>
        <tbody>
            @foreach(['Aviso 1','Aviso 2','Aviso 3','Aviso 4'] as $aviso)
            <tr>
                <td>{{ $aviso }}</td>
                @for ($i=0; $i<4; $i++)
                <td><input type="checkbox" class="check-style"></td>
                @endfor
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Alerta oculta --}}
    <div id="alertMarcado" class="alert">
        ¡Marcado guardado con éxito!
    </div>
</div>
@endsection


@push('scripts')
<script>
document.querySelectorAll('.check-style').forEach(chk => {
    chk.addEventListener('change', () => {
        let alertBox = document.getElementById('alertMarcado');
        alertBox.style.display = 'block';
        setTimeout(() => alertBox.style.display = 'none', 2000);
    });
});
</script>
@endpush
