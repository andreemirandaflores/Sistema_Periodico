document.addEventListener("DOMContentLoaded", function () {
    const textarea = document.getElementById("texto_aviso");
    const radios = document.querySelectorAll("input[name='formato']");
    const fechasInput = document.getElementById("fechasSeleccionadas");
    const precioTotal = document.getElementById("precioTotal");

    // Seleccionar "Normal" por defecto
    document.querySelector("input[name='formato'][value='Normal']").checked = true;

    function calcularPrecio() {
        let dias = 0;
        if (fechasInput.value.trim() !== "") {
            dias = fechasInput.value.split(",").filter(f => f.trim() !== "").length;
        }

        if (dias === 0) {
            precioTotal.textContent = "0.00 Bs.";
            return;
        }

        let texto = textarea.value.trim();
        let palabras = texto === "" ? 0 : texto.split(/\s+/).length;

        let precioBase = palabras * 0.80;

        let formatoSeleccionado = document.querySelector("input[name='formato']:checked").value;
        let extraFormato = 0;
        if (formatoSeleccionado === "Resaltado") {
            extraFormato = 5;
        } else if (formatoSeleccionado === "Recuadro") {
            extraFormato = 15;
        }

        let precioDia = precioBase + extraFormato;
        let total = precioDia * dias;

        precioTotal.textContent = total.toFixed(2) + " Bs.";
    }

    textarea.addEventListener("input", calcularPrecio);
    radios.forEach(radio => radio.addEventListener("change", calcularPrecio));
    fechasInput.addEventListener("input", calcularPrecio);

    // 🚀 escuchar evento personalizado del calendario
    document.addEventListener("fechasCambiaron", calcularPrecio);

    calcularPrecio(); // calcular al inicio
});
