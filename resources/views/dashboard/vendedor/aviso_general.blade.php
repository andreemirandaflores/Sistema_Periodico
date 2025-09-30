@extends('layouts.dashboard')

@section('title', 'Aviso General')

@section('sidebar')
<li><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Dashboard Principal</a></li>
<li><a href="#"><i class="fas fa-users"></i> Clientes</a></li>
<li><a href="#"><i class="fas fa-bullhorn"></i> Gestión de Avisos</a></li>
<li><a href="#"><i class="fas fa-clipboard-list"></i> Hoja de control</a></li>
<li><a href="#"><i class="fas fa-chart-line"></i> Reportes personales</a></li>
@endsection

@section('content')
<style>
.custom-alert {
    padding: 12px 20px;
    border-radius: 8px;
    margin-bottom: 20px;
    font-size: 15px;
    display: flex;
    align-items: center;
    gap: 8px;
}

/* Estilo éxito */
.success-alert {
    background-color: #d4edda;
    border: 1px solid #c3e6cb;
    color: #155724;
}

.success-alert i {
    color: #28a745;
    font-size: 18px;
}
</style>
<div class="custom-alert success-alert">
    <i class="fas fa-check-circle"></i> Venta registrada exitosamente.
</div>
<form action="{{ route('venta-avisos.store') }}" method="POST">
    @csrf
    <div class="form-container">
        <!-- Sección Aviso General (70%) -->
        <div class="aviso-section">

            <div class="form-row">
                <div>
                    <label for="columnas">Columnas</label>
                    <input type="number" id="columnas" name="columnas" class="aviso-input-text" min="1" max="10" placeholder="Ej. 3">
                </div>
                <div>
                    <label for="alto">Alto (cm)</label>
                    <input type="number" id="alto" name="alto" class="aviso-input-text" min="1" placeholder="Ej. 5">
                </div>
            </div>

            <div class="form-row radio-row">
                <label><input type="radio" name="color" value="BN" class="aviso-radio" checked> Blanco y Negro</label>
                <label><input type="radio" name="color" value="Color" class="aviso-radio"> Color</label>
            </div>

            <div class="form-row">
                <label for="observaciones">Texto / Observaciones</label>
                <textarea id="observaciones" name="observaciones" class="aviso-input-textarea" rows="4" placeholder="Observaciones..."></textarea>
            </div>

            <div class="form-row">
                <div class="calendario-section">
                    <div class="calendario-header">
                        <button type="button" id="prevMes" class="calendario-btn">&lt;</button>
                        <span id="mesActual"></span>
                        <button type="button" id="nextMes" class="calendario-btn">&gt;</button>
                    </div>

                    <div class="calendario-grid">
                        <div class="dias-semana">
                            <div>Lun</div><div>Mar</div><div>Mié</div><div>Jue</div><div>Vie</div><div>Sáb</div><div>Dom</div>
                        </div>
                        <div id="calendario"></div>
                    </div>

                    <!-- Hidden para enviar fechas -->
                    <input type="hidden" id="fechasSeleccionadas" name="fechas">
                </div>
            </div>
        </div>

        <!-- Mini formulario de Factura (30%) -->
        <div class="factura-section">
            <label for="total">Total</label>
            <h2 id="precioTotal">0.00 Bs.</h2>
            <input type="hidden" id="total_hidden" name="total">

            <label for="efectivo">Efectivo</label>
            <input type="text" id="efectivo" name="efectivo" class="aviso-input-text">

            <label for="cambio">Cambio</label>
            <input type="text" id="cambio" class="aviso-input-text" readonly>
            <input type="hidden" id="cambio_hidden" name="cambio">

            <label for="nit">NIT:</label>
            <input type="text" id="nit" name="nit" class="aviso-input-text">

            <label for="nombre">Nombre/Razón Social:</label>
            <input type="text" id="nombre" name="nombre" class="aviso-input-text">

            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" class="aviso-input-text">

            <button type="submit">Facturar</button>
        </div>
    </div>
</form>

<script>
jQuery(function($) {
    // Autocomplete de clientes
    $("#nit, #nombre").autocomplete({
        source: function(request, response) {
            $.getJSON("{{ route('clientes.autocomplete') }}", { term: request.term }, response);
        },
        minLength: 2,
        focus: function(event, ui) { return false; },
        select: function(event, ui) {
            $("#nit").val(ui.item.nit);
            $("#nombre").val(ui.item.nombre);
            $("#telefono").val(ui.item.telefono);
            return false;
        }
    })
    .autocomplete("instance")._renderItem = function(ul, item) {
        return $("<li>").append("<div>" + item.nit + " - " + item.nombre + "</div>").appendTo(ul);
    };

    // Cambio automático
    $("#cambio").prop("readonly", true);
    $("#efectivo").on("input", function() {
        let total = parseFloat($("#precioTotal").text().replace(' Bs.', '').trim()) || 0;
        let efectivo = parseFloat($(this).val()) || 0;
        let cambio = efectivo - total;
        $("#cambio").val(cambio >= 0 ? cambio.toFixed(2) : "0.00");
        $("#cambio_hidden").val(cambio >= 0 ? cambio.toFixed(2) : "0.00");
    });

    // Actualizar hidden total
    function actualizarTotal() {
        let total = parseFloat($("#precioTotal").text().replace(' Bs.', '').trim()) || 0;
        $("#total_hidden").val(total.toFixed(2));
    }
    actualizarTotal();

    const observer = new MutationObserver(actualizarTotal);
    observer.observe(document.getElementById('precioTotal'), { childList: true });
});
</script>
@endsection

@section('scripts')
    <script src="{{ asset('js/calendario.js') }}"></script>
    <script src="{{ asset('js/precio.js') }}"></script>
@endsection
