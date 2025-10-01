@extends('layouts.dashboard')

@section('title', 'Aviso económico')

@section('sidebar')
<li><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Dashboard Principal</a></li>
<li><a href="#"><i class="fas fa-users"></i> Clientes</a></li>
<li><a href="#"><i class="fas fa-bullhorn"></i> Gestión de Avisos</a></li>
<li><a href="#"><i class="fas fa-clipboard-list"></i> Hoja de control</a></li>
<li><a href="#"><i class="fas fa-chart-line"></i> Reportes personales</a></li>
@endsection

@section('content')
<div class="form-container">
    <!-- Sección del aviso (70%) -->
    <div class="aviso-section">
        <textarea id="texto_aviso" class="aviso-input-textarea" rows="4" placeholder="Texto del aviso (Máximo 25 palabras)..."></textarea>

        <div class="form-row">
            <div>
                <label for="clasificacion">Clasificación</label>
                <select id="clasificacion" name="clasificacion" class="aviso-input-select">
                    <option value="">Seleccione</option>
                </select>
            </div>
            <div>
                <label for="subcategoria">Subcategoría:</label>
                <select id="subcategoria" name="subcategoria" class="aviso-input-select">
                    <option value="">Seleccione</option>
                </select>
            </div>
            <div>
                <label for="tipo">Tipo:</label>
                <select id="tipo" name="tipo" class="aviso-input-select">
                    <option value="">Seleccione</option>
                </select>
            </div>
        </div>

        <div class="form-row radio-row">
            <label><input type="radio" name="formato" value="Normal" class="aviso-radio"> Normal</label>
            <label><input type="radio" name="formato" value="Resaltado" class="aviso-radio"> Resaltado</label>
            <label><input type="radio" name="formato" value="Recuadro" class="aviso-radio"> Recuadro</label>
        </div>

        <div class="form-row">
            <div class="calendario-section">
                <div class="calendario-header">
                    <button id="prevMes" class="calendario-btn">&lt;</button>
                    <span id="mesActual"></span>
                    <button id="nextMes" class="calendario-btn">&gt;</button>
                </div>

                <div class="calendario-grid">
                    <div class="dias-semana">
                        <div>Lun</div><div>Mar</div><div>Mié</div><div>Jue</div><div>Vie</div><div>Sáb</div><div>Dom</div>
                    </div>
                    <div id="calendario"></div>
                </div>

                <!-- Fechas seleccionadas (hidden para enviar al backend) -->
                <input id="fechasSeleccionadas" name="Fechas">
            </div>
        </div>
    </div>

    <!-- Mini formulario de Factura (30%) -->
    <div class="factura-section">
        <label for="total">Total</label>
        <h2 id="precioTotal">0.00 Bs.</h2> <!-- corregido -->

        <label for="efectivo">Efectivo</label>
        <input type="text" id="efectivo" class="aviso-input-text">

        <label for="cambio">Cambio</label>
        <input type="text" id="cambio" class="aviso-input-text">

        <label for="nit">NIT</label>
        <input type="text" id="nit" class="aviso-input-text">

        <label for="nombre">Nombre o Razón Social</label>
        <input type="text" id="nombre" class="aviso-input-text">

        <label for="telefono">Teléfono</label>
        <input type="text" id="telefono" class="aviso-input-text">

        <button type="submit" class="btn btn-aceptar">Facturar</button>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const clasificacion = document.getElementById("clasificacion");
    const subcategoria = document.getElementById("subcategoria");
    const tipo = document.getElementById("tipo");

    // Cargar clasificaciones
    fetch("/clasificaciones")
        .then(res => res.json())
        .then(data => {
            data.forEach(item => {
                clasificacion.add(new Option(item.Descripcion, item.CodTipoAviso));
            });
        });

    clasificacion.addEventListener("change", async (e) => {
        const id = e.target.value;

        subcategoria.innerHTML = '<option value="">Seleccione</option>';
        tipo.innerHTML = '<option value="">Seleccione</option>';

        if (!id) return;

        const subRes = await fetch(`/subcategorias/${id}`);
        const subData = await subRes.json();
        subData.forEach(item => subcategoria.add(new Option(item.DescripcionTipo, item.CodTipo)));

        const tipoRes = await fetch(`/tipos/${id}`);
        const tipoData = await tipoRes.json();
        tipoData.forEach(item => tipo.add(new Option(item.DescripcionItemTrans, item.CodItemTrans)));
    });
});
</script>

@section('scripts')
    <script src="{{ asset('js/calendario.js') }}"></script>
    <script src="{{ asset('js/precio.js') }}"></script>
@endsection
@endsection
