<?php
require_once "../conexion.php";
require_once "Alumno.php";

$database = new Database();

$conn = $database->connect(); // conecta a la base de datos

$id = $_GET['id'];

$alumno = new Alumno();

$mostrar = $alumno->getAlumno($database, $id);



$asistencias = $database->ejecutarConsulta("SELECT * FROM `asistencias` WHERE `id_alumno` = $id ")
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Alumno</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<body>
    <div class="container my-5">
        <!-- Título del alumno -->
        <h2 class="mb-4 text-primary"><?php echo $mostrar[0]["nombre"] . ' ' . $mostrar[0]["apellido"]; ?></h2>

        <!-- Sección de Asistencias -->
        <h3 class="mb-3">Asistencias</h3>
        <?php if (!empty($asistencias)) { ?>
            <ul class="list-group mb-4">
                <?php foreach ($asistencias as $asistencia) { ?>
                    <li class="list-group-item">
                        <?php
                        // Suponiendo que $asistencia['fecha'] está en formato YYYY-MM-DD
                        $fecha_formateada = date("j F Y", strtotime($asistencia['fecha']));
                        echo $fecha_formateada;
                        ?>
                    </li>
                <?php } ?>
            </ul>
        <?php } else { ?>
            <p class="text-warning">No se han registrado asistencias para este alumno.</p>
        <?php } ?>

        <!-- Botón de volver -->
        <a href="index_alumno.php" class="btn btn-secondary">Volver</a>
    </div>

    <!-- Bootstrap JS y dependencias -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>