<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Prueba Aviso Económico</title>
</head>
<body>
    <h1>Formulario de prueba para Aviso Económico</h1>

<form method="POST" action="{{ route('aviso_economico.store') }}">
    @csrf

    <label>Aviso:</label>
    <input type="text" name="Aviso" value="Prueba aviso"><br>

    <label>Formato:</label>
    <input type="text" name="Formato" value="Normal"><br>

    <label>CodTipoTrans:</label>
    <input type="number" name="CodTipoTrans" value="1"><br>

    <label>CodItemTrans:</label>
    <input type="number" name="CodItemTrans" value="1"><br>

    <label>Fechas (separadas por coma, ej: 2025-09-30,2025-10-02):</label>
    <input type="text" name="Fechas" value="2025-09-30,2025-10-02"><br>

    <label>Total:</label>
    <input type="number" name="Total" value="100"><br>

    <label>NombreCliente:</label>
    <input type="text" name="NombreCliente" value="Nombre Prueba"><br>

    <label>NIT:</label>
    <input type="text" name="NIT" value="123456789"><br>

    <label>Telefono:</label>
    <input type="text" name="Telefono" value="12345678"><br>

    <button type="submit">Guardar Aviso</button>
</form>

</body>
</html>
