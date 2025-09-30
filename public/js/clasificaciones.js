document.addEventListener("DOMContentLoaded", () => {
    const clasificacion = document.getElementById("clasificacion");
    const subcategoria = document.getElementById("subcategoria");
    const tipo = document.getElementById("tipo");

    if (!clasificacion || !subcategoria || !tipo) return;

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
