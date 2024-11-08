<?php
require_once "../conexion.php";

$database = new Database();

$conn = $database->connect();// conecta a la base de datos

$institutos = $database->ejecutarConsulta("SELECT * FROM `institutos`");
$materias = $database->ejecutarConsulta("SELECT * FROM `materias`");

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow-lg" style="max-width: 500px; width: 100%;">
            <form action="procesar_registro.php" method="POST">
                <h2 class="text-center mb-4">Registro de Usuario</h2>

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>

                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido:</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="contraseña" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" id="contraseña" name="contraseña" required>
                </div>

                <div class="mb-3">
                    <label for="dni" class="form-label">DNI:</label>
                    <input type="text" class="form-control" id="dni" name="dni">
                </div>

                <div class="mb-3">
                    <label for="instituto" class="form-label">Instituto:</label>
                    <SELECT class="form-control" name="instituto">
                     <?php
                        foreach ($institutos as $instituto) {
                       echo "<option value = ".$instituto['id'].">". $instituto['nombre'] ."</option>"; 
                     } 
                     ?>
                    </SELECT>
                </div>

                <div class="mb-3">
                    <label for="legajo" class="form-label">Legajo:</label>
                    <input type="number" class="form-control" id="legajo" name="legajo">
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-block">Registrarse</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>