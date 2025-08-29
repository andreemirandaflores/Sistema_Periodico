@extends('layouts.dashboard')

@section('title', 'Dashboard Producción')

@section('sidebar')
<li><a href="#"><i class="fas fa-home"></i> Dashboard Principal</a></li>
<li><a href="#"><i class="fas fa-boxes"></i> Gestión de Inventario</a></li>
<li><a href="#"><i class="fas fa-industry"></i> Producción</a></li>
<li><a href="#"><i class="fas fa-cogs"></i> Maquinaria</a></li>
<li><a href="#"><i class="fas fa-chart-line"></i> Reportes</a></li>
@endsection

@section('header', 'Panel Producción')

@section('content')
<p>Aquí van los indicadores y tareas relacionadas con el área de producción.</p>
@endsection
