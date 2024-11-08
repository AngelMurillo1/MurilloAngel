<?php 
require_once "../conexion.php";

session_start();

$database = new Database();

$conn = $database->connect();// conecta a la base de datos

if ($_SERVER["REQUEST_METHOD"]== "POST") {
    $nombre = $_POST['nombre'];

 $idProfesor = $_SESSION['profesor'][0]['id'];
 $idInstituto = $_SESSION['profesor'][0]['id_instituto'];

 var_dump($idProfesor,$idInstituto);

    $database->ejecutarConsulta("INSERT INTO `materias`(`id`, `nombre`, `id_profesor`, `id_instituto`) VALUES (NULL,'$nombre',$idProfesor,$idInstituto)");

    header("Location: ../Alumno/index_alumno.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nueva Materia</title>
    <!-- Incluye Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Crear Nueva Materia</h2>
        <form action="alta_materia.php" method="post" class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre de la materia</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
                <div class="invalid-feedback">
                    Por favor, ingrese el nombre de la materia.
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>

</body>
</html>