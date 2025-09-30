@extends('layouts.dashboard')

@section('title', 'Listado de Avisos')

@section('sidebar')
<li><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Dashboard Principal</a></li>
<li><a href="#"><i class="fas fa-users"></i> Clientes</a></li>
<li><a href="#"><i class="fas fa-bullhorn"></i> Gestión de Avisos</a></li>
<li><a href="#"><i class="fas fa-clipboard-list"></i> Hoja de control</a></li>
<li><a href="#"><i class="fas fa-chart-line"></i> Reportes personales</a></li>
@endsection

@section('content')

<!-- Alert oculto -->
<div id="alertListado" class="custom-alert success-alert">
    <i class="fas fa-check-circle"></i> Listado descargado exitosamente.
</div>

<!-- Encabezado con fecha actual y filtro -->
<div class="header-listado">
    <h3>Fecha: <span id="fechaActual"></span></h3>

    <select id="filtroFecha" class="aviso-input-select">
        <option value="">-- Filtrar por fecha --</option>
        <option value="hoy">Hoy</option>
        <option value="ayer">Ayer</option>
        <option value="semana">Última semana</option>
    </select>
</div>

<!-- Contenido dividido en 2 columnas -->
<div class="listado-container">
    <!-- Sección izquierda (70%) -->
    <div class="listado-section">
        <table class="tabla-avisos">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Cliente</th>
                    <th>Clasificación</th>
                    <th>Texto</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <!-- Ejemplo de datos -->
                <tr>
                    <td>1</td>
                    <td>Juan Pérez</td>
                    <td>Económico</td>
                    <td>Se vende vehículo en buen estado</td>
                    <td>14/09/2025</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Empresa XYZ</td>
                    <td>General</td>
                    <td>Publicidad de servicios profesionales</td>
                    <td>14/09/2025</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Sección derecha (30%) -->
    <div class="acciones-section">
        <button class="btn-accion" onclick="window.print()">Imprimir</button>
        <button class="btn-accion" onclick="mostrarAlerta()">Descargar PDF</button>
    </div>
</div>

<style>
/* Alert reutilizado */
.custom-alert {
    padding: 12px 20px;
    border-radius: 8px;
    margin-bottom: 20px;
    font-size: 15px;
    display: flex;
    align-items: center;
    gap: 8px;
}
.success-alert {
    background-color: #d4edda;
    border: 1px solid #c3e6cb;
    color: #155724;
}
.success-alert i {
    color: #28a745;
    font-size: 18px;
}

/* Layout del listado */
.header-listado {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}
.listado-container {
    display: flex;
    gap: 20px;
}
.listado-section {
    flex: 7;
}
.acciones-section {
    flex: 3;
    display: flex;
    flex-direction: column;
    gap: 15px;
}
.tabla-avisos {
    width: 100%;
    border-collapse: collapse;
}
.tabla-avisos th, .tabla-avisos td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}
.tabla-avisos th {
    background-color: #f8f9fa;
}
.btn-accion {
    padding: 12px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 14px;
}
.btn-accion:hover {
    background-color: #0056b3;
}
</style>

<script>
// Mostrar fecha actual
document.getElementById("fechaActual").textContent = 
    new Date().toLocaleDateString('es-BO', { year: 'numeric', month: '2-digit', day: '2-digit' });

// Mostrar alerta al descargar
function mostrarAlerta() {
    document.getElementById("alertListado").style.display = "flex";
}
</script>

@endsection
