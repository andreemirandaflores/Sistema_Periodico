@extends('layouts.dashboard')

@section('title', 'Dashboard Vendedor')

@section('sidebar')
<li><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Dashboard Principal</a></li>
<li><a href="#"><i class="fas fa-users"></i> Clientes</a></li>
<li><a href="#"><i class="fas fa-bullhorn"></i> Gestión de Avisos</a></li>
<li><a href="{{ route('reporte_participacion') }}"><i class="fas fa-clipboard-list"></i> Hoja de control</a></li>
<li><a href="#"><i class="fas fa-chart-line"></i> Reportes personales</a></li>
@endsection

@section('header', 'Panel Vendedor')

@section('content')
<div class="dashboard-grid">
<a href="{{ route('aviso_economico') }}" class="card aviso-economico">
    <i class="fas fa-dollar-sign fa-3x icon-card"></i>
    <h3>Aviso Económico</h3>
    <p>Publicaciones de tipo económico.</p>
</a>


    <div class="card aviso-bloque">
        <i class="fas fa-th-large fa-3x icon-card"></i>
        <h3>Aviso en Bloque</h3>
        <p>Avisos destacados en secciones especiales o agrupados.</p>
    </div>
    <div class="card aviso-necrologico">
        <i class="fas fa-cross fa-3x icon-card"></i>
        <h3>Aviso Necrológico</h3>
        <p>Publicaciones de fallecimientos o recordatorios.</p>
    </div>
    <div class="card aviso-judicial">
        <i class="fas fa-gavel fa-3x icon-card"></i>
        <h3>Aviso Judicial</h3>
        <p>Avisos legales, citaciones y procesos judiciales.</p>
    </div>
<a href="{{ route('aviso_general') }}" class="card aviso-comercial">
    <i class="fas fa-store fa-3x icon-card"></i>
    <h3>Aviso General</h3>
    <p>Publicidad de negocios, productos o servicios comerciales.</p>
</a>

    <div class="card aviso-web">
        <i class="fas fa-globe fa-3x icon-card"></i>
        <h3>Aviso Web</h3>
        <p>Publicaciones para páginas web o anuncios digitales.</p>
    </div>
    <div class="card aviso-redes">
        <i class="fab fa-facebook fa-3x icon-card"></i>
        <h3>Aviso Redes Sociales</h3>
        <p>Publicaciones dirigidas a plataformas sociales.</p>
    </div>
    <div class="card aviso-varios">
        <i class="fas fa-clipboard-list fa-3x icon-card"></i>
        <h3>Avisos Varios</h3>
        <p>Publicaciones que no encajan en las categorías anteriores.</p>
    </div>

</div>
@endsection