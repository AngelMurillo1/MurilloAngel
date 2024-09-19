<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
</head>
<body>
    <h2>Formulario</h2>
    <form action="main.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br><br>

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" required><br><br>

        <label for="fecha_nacimiento">Fecha de Nacimiento (DD-MM-AAAA):</label>
        <input type="text" name="fecha_nacimiento" required><br><br>

        <label for="dni">DNI:</label>
        <input type="text" name="dni" required><br><br>

        <label for="localidad">Localidad:</label>
        <input type="text" name="localidad" required><br><br>

        <label for="provincia">Provincia:</label>
        <input type="text" name="provincia" required><br><br>

        <label for="telefono">Teléfono:</label>
        <input type="number" name="telefono" required><br><br>

        <label>Tipo de Usuario:</label>
        <input type="radio" name="tipo_usuario" value="empleado" required> Empleado
        <input type="radio" name="tipo_usuario" value="cliente" required> Cliente <br><br>

        <div id="empleado_fields">
            <label for="legajo">Número de Legajo (8 dígitos):</label>
            <input type="text" name="legajo"><br><br>
        </div>

        <div id="cliente_fields">
            <label for="numero_cuenta">Número de Cuenta:</label>
            <input type="text" name="numero_cuenta"><br><br>

            <label for="monto">Monto de Dinero:</label>
            <input type="text" name="monto"><br><br>
        </div>

        <button type="submit" value="Enviar">Enviar </button>
    </form>
</body>
</html>