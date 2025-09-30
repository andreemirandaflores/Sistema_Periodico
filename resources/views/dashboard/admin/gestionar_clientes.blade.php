@extends('layouts.dashboard')

@section('title', 'Gestión de Clientes')

@section('sidebar')
<li><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Dashboard Principal</a></li>
<li><a href="{{ route('personals.index') }}"><i class="fas fa-users"></i> Gestión de Personal</a></li>
<li><a href="{{ route('gestionar_clientes') }}"><i class="fas fa-users"></i> Gestión de Clientes</a></li>
<li><a href="#"><i class="fas fa-bullhorn"></i> Gestión de Avisos</a></li>
<li><a href="#"><i class="fas fa-chart-line"></i> Reportes</a></li>
<li><a href="#"><i class="fas fa-cog"></i> Configuración</a></li>
@endsection

@section('header', 'Gestión de Clientes')

@section('content')

@if(session('success'))
    <div class="alert alert-exito">{{ session('success') }}</div>
@endif

<div class="tabla-header">
    <h3><i class="fas fa-users"></i> Lista de Clientes</h3>
    <a href="{{ route('personals.create') }}" class="btn btn-aceptar btn-sm">
        <i class="fas fa-plus"></i> Nuevo Cliente
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
        @foreach($clientes as $cliente)
        <tr>
            <td>{{ $cliente->Nombre }}</td>
            <td>{{ $cliente->Apellido }}</td>
            <td>{{ $cliente->email }}</td>
            <td>{{ $cliente->telefono }}</td>
            <td>{{ $cliente->cargo->NombreCargo ?? '-' }}</td>
            <td class="acciones">
                <a href="javascript:void(0)" 
                   class="btn-icon editar" 
                   onclick="openModal('modalEditar{{ $cliente->CodPersonal }}')"
                   title="Editar">
                   <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('personals.destroy', $cliente->CodPersonal) }}" 
                      method="POST" 
                      onsubmit="return confirm('¿Está seguro de eliminar este cliente?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn-icon eliminar" title="Eliminar">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>

        <!-- Modal -->
        <div id="modalEditar{{ $cliente->CodPersonal }}" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2><i class="fas fa-user-edit"></i> Editar Cliente</h2>
                    <span class="close" onclick="closeModal('modalEditar{{ $cliente->CodPersonal }}')">&times;</span>
                </div>
                <div class="modal-body">
                    <form action="{{ route('personals.update', $cliente->CodPersonal) }}" method="POST" class="formulario">
                        @csrf
                        @method('PUT')

                        <label>Nombre:</label>
                        <input type="text" name="Nombre" value="{{ $cliente->Nombre }}" class="input">

                        <label>Apellido:</label>
                        <input type="text" name="Apellido" value="{{ $cliente->Apellido }}" class="input">

                        <label>Email:</label>
                        <input type="email" name="email" value="{{ $cliente->email }}" class="input">

                        <label>Teléfono:</label>
                        <input type="text" name="telefono" value="{{ $cliente->telefono }}" class="input">

                        <label>Cargo:</label>
                        <select name="CodCargo" class="input">
                            @foreach($cargos as $cargo)
                                <option value="{{ $cargo->CodCargo }}" {{ $cliente->CodCargo == $cargo->CodCargo ? 'selected' : '' }}>
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
                    <button type="button" class="btn btn-cancelar" onclick="closeModal('modalEditar{{ $cliente->CodPersonal }}')">Cancelar</button>
                </div>
            </div>
        </div>
        @endforeach
    </tbody>
</table>
@endsection
