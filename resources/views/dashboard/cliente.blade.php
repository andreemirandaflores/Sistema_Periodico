@extends('layouts.dashboard')

@section('title', 'Dashboard Cliente')

@section('sidebar')
<li><a href="#"><i class="fas fa-home"></i> Dashboard Principal</a></li>
<li><a href="#"><i class="fas fa-bullhorn"></i> Mis Avisos</a></li>
<li><a href="#"><i class="fas fa-file-invoice-dollar"></i> Pagos / Facturas</a></li>
<li><a href="#"><i class="fas fa-headset"></i> Soporte / Contacto</a></li>
@endsection

@section('header', 'Panel Cliente')

@section('content')
<p>Aquí puedes ver tus avisos publicados, próximos pagos y contactar soporte.</p>
@endsection
