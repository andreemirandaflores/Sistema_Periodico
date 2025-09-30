@extends('layouts.dashboard')

@section('title', 'Dashboard Administrador')

@section('sidebar')
<li><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Dashboard Principal</a></li>
<li><a href="{{ route('personals.index') }}"><i class="fas fa-users"></i> Gestión de Personal</a></li>
<li><a href="{{ route('gestionar_clientes') }}"><i class="fas fa-users"></i> Gestión de Clientes</a></li>
<li><a href="#"><i class="fas fa-bullhorn"></i> Gestión de Avisos</a></li>
<li><a href="#"><i class="fas fa-chart-line"></i> Reportes</a></li>
<li><a href="#"><i class="fas fa-cog"></i> Configuración</a></li>
@endsection

@section('header', 'Panel Administrador')

@section('content')
<p>Aquí van las estadísticas y KPIs del administrador.</p>
@endsection
