{{-- resources/views/reporte-participacion.blade.php --}}
@extends('layouts.dashboard')

@section('content')
<style>
/* Contenedor y título */
.container {
    max-width: 1000px;
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

/* Tabla de reporte */
.reporte-table {
    width: 100%;
    border-collapse: collapse;
    text-align: center;
}

.reporte-table th, .reporte-table td {
    border: 1px solid #ccc;
    padding: 0.6rem;
}

.reporte-table thead {
    background-color: #f5f5f5;
}

.reporte-table tbody tr:hover {
    background-color: #f0f8ff;
}

.reporte-table td:first-child {
    text-align: left;
    font-weight: 500;
}

/* Estado visual */
.status-present {
    background-color: #d4edda;
    color: #155724;
    font-weight: 600;
    padding: 0.2rem 0.4rem;
    border-radius: 0.3rem;
}

.status-absent {
    background-color: #f8d7da;
    color: #721c24;
    font-weight: 600;
    padding: 0.2rem 0.4rem;
    border-radius: 0.3rem;
}

.status-late {
    background-color: #fff3cd;
    color: #856404;
    font-weight: 600;
    padding: 0.2rem 0.4rem;
    border-radius: 0.3rem;
}
</style>

<div class="container mt-4">
    {{-- Título --}}
    <h2 class="page-title">Reporte Diario de Participación</h2>

    {{-- Fecha y filtro --}}
    <div class="filter-container">
        <span class="label">Fecha del reporte:</span>
        <input type="text" class="date-input" value="{{ now()->format('d/m/Y') }}" readonly>
        <select class="date-select">
            <option selected>Por Fechas</option>
            <option value="1">Ayer</option>
            <option value="2">Semana</option>
            <option value="3">Mes</option>
        </select>
    </div>

    {{-- Tabla de reporte --}}
    <table class="reporte-table">
        <thead>
            <tr>
                <th>Participante</th>
                <th>Asistencia</th>
                <th>Hora de ingreso</th>
                <th>Comentarios</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach(['Juan Pérez','María López','Carlos Díaz','Ana Torres'] as $participante)
            <tr>
                <td>{{ $participante }}</td>
                <td>
                    <input type="checkbox" class="check-style" checked>
                </td>
                <td>08:15</td>
                <td>Participó activamente</td>
                <td><span class="status-present">Presente</span></td>
            </tr>
            <tr>
                <td>{{ $participante }}</td>
                <td>
                    <input type="checkbox" class="check-style">
                </td>
                <td>-</td>
                <td>No asistió</td>
                <td><span class="status-absent">Ausente</span></td>
            </tr>
            <tr>
                <td>{{ $participante }}</td>
                <td>
                    <input type="checkbox" class="check-style" checked>
                </td>
                <td>08:45</td>
                <td>Ingresó tarde</td>
                <td><span class="status-late">Tarde</span></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<script>
document.querySelectorAll('.check-style').forEach(chk => {
    chk.addEventListener('change', () => {
        // Solo visual, no hace nada
    });
});
</script>
@endpush
