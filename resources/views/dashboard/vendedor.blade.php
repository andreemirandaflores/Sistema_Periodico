@extends('layouts.dashboard')

@section('title', 'Dashboard Vendedor')

@section('sidebar')
<li><a href="#"><i class="fas fa-home"></i> Dashboard Principal</a></li>
<li><a href="#"><i class="fas fa-users"></i> Clientes</a></li>
<li><a href="#"><i class="fas fa-bullhorn"></i> Gestión de Avisos</a></li>
<li><a href="#"><i class="fas fa-clipboard-list"></i> Hoja de control</a></li>
<li><a href="#"><i class="fas fa-chart-line"></i> Reportes personales</a></li>
@endsection

@section('header', 'Panel Vendedor')

@section('content')
<p>Aquí se mostrará el resumen de su actividad: ventas, clientes y avisos asignados.</p>
@endsection
