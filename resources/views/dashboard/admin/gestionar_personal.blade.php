@extends('layouts.dashboard')

@section('title', 'Gestión de Personal')

@section('sidebar')
<li><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Dashboard Principal</a></li>
<li><a href="{{ route('personals.index') }}"><i class="fas fa-users"></i> Gestión de Personal</a></li>
<li><a href="{{ route('gestionar_clientes') }}"><i class="fas fa-users"></i> Gestión de Clientes</a></li>
<li><a href="#"><i class="fas fa-bullhorn"></i> Gestión de Avisos</a></li>
<li><a href="#"><i class="fas fa-chart-line"></i> Reportes</a></li>
<li><a href="#"><i class="fas fa-cog"></i> Configuración</a></li>
@endsection

@section('header', 'Gestión de Personal')

@section('content')

@if(session('success'))
    <div class="alert alert-exito">{{ session('success') }}</div>
@endif

<div class="tabla-header">
    <h3><i class="fas fa-users"></i> Lista de Personal</h3>
    <a href="{{ route('personals.create') }}" class="btn btn-aceptar btn-sm">
        <i class="fas fa-plus"></i> Nuevo Personal
    </a>
</div>

<table class="tabla tabla-elegante">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Cargo</th>
            <th class="text-center">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($personals as $personal)
        <tr>
            <td>{{ $personal->Nombre }}</td>
            <td>{{ $personal->Apellido }}</td>
            <td>{{ $personal->email }}</td>
            <td>{{ $personal->telefono }}</td>
            <td>{{ $personal->cargo->NombreCargo ?? '-' }}</td>
            <td class="acciones">
                <a href="javascript:void(0)" 
                   class="btn-icon editar" 
                   onclick="openModal('modalEditar{{ $personal->CodPersonal }}')"
                   title="Editar">
                   <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('personals.destroy', $personal->CodPersonal) }}" 
                      method="POST" 
                      onsubmit="return confirm('¿Está seguro de eliminar este personal?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn-icon eliminar" title="Eliminar">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>

        <!-- Modal -->
        <div id="modalEditar{{ $personal->CodPersonal }}" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2><i class="fas fa-user-edit"></i> Editar Personal</h2>
                    <span class="close" onclick="closeModal('modalEditar{{ $personal->CodPersonal }}')">&times;</span>
                </div>
                <div class="modal-body">
                    <form action="{{ route('personals.update', $personal->CodPersonal) }}" method="POST" class="formulario">
                        @csrf
                        @method('PUT')

                        <label>Nombre:</label>
                        <input type="text" name="Nombre" value="{{ $personal->Nombre }}" class="input">

                        <label>Apellido:</label>
                        <input type="text" name="Apellido" value="{{ $personal->Apellido }}" class="input">

                        <label>Email:</label>
                        <input type="email" name="email" value="{{ $personal->email }}" class="input">

                        <label>Teléfono:</label>
                        <input type="text" name="telefono" value="{{ $personal->telefono }}" class="input">

                        <label>Cargo:</label>
                        <select name="CodCargo" class="input">
                            @foreach($cargos as $cargo)
                                <option value="{{ $cargo->CodCargo }}" {{ $personal->CodCargo == $cargo->CodCargo ? 'selected' : '' }}>
                                    {{ $cargo->NombreCargo }}
                                </option>
                            @endforeach
                        </select>

                        <label>Contraseña:</label>
                        <input type="password" name="password" class="input" placeholder="Dejar vacío si no desea cambiar">

                        <label>Confirmar Contraseña:</label>
                        <input type="password" name="password_confirmation" class="input">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-aceptar">Guardar</button>
                    <button type="button" class="btn btn-cancelar" onclick="closeModal('modalEditar{{ $personal->CodPersonal }}')">Cancelar</button>
                </div>
            </div>
        </div>
        @endforeach
    </tbody>
</table>
@endsection
