<?php
require_once "../conexion.php";
require_once "Alumno.php";

$database = new Database();

$conn = $database->connect();// conecta a la base de datos

$alumno = new Alumno();

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $dni = $_POST['dni'];
        $email = $_POST['email'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $materia = $_POST['materia'];


        $alumno->setAlumno($database, $nombre, $apellido, $dni, $fecha_nacimiento, $materia, $email);

        header('Location: index_alumno.php');
    }

    $materias = $database->ejecutarConsulta("SELECT * FROM `materias`");

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de Nuevo Alumno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3 class="text-center mb-4">Alta de Nuevo Alumno</h3>
        <form action="alta_alumno.php" method="POST" class="card p-4 shadow-lg">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido:</label>
                <input type="text" class="form-control" id="apellido" name="apellido" required>
            </div>

            <div class="mb-3">
                <label for="dni" class="form-label">DNI:</label>
                <input type="text" class="form-control" id="dni" name="dni" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento:</label>
                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
            </div>

            <div class="mb-3">
                <label for="materia" class="form-label">Materia:</label>
                <SELECT class="form-control" name="materia">
                    <?php
                        foreach ($materias as $materia) {
                                echo "<option value = ".$materia['id'].">". $materia['nombre'] ."</option>";
                         } 
                    
                    ?>
                </SELECT> 
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>