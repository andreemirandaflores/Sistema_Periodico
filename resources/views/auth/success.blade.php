<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login Exitoso</title>
</head>
<body>
    <h1>Inicio de sesión exitoso</h1>
    <p>Bienvenido, {{ Auth::user()->Nombre }} {{ Auth::user()->Apellido }}.</p>
</body>
</html>
