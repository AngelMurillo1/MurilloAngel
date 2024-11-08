<?php
require_once "../conexion.php";
require_once "Alumno.php";

session_start();
$database = new Database();

$Alumno = new Alumno();

$where = ''; // Inicializa la variable $where

if (isset($_GET['filtro_materia']) && ($_GET['filtro_materia']!="")) {
    $where .= '`materias`.`id`=' . intval($_GET['filtro_materia']);
}

$query = 'SELECT 
            `alumnos`.*, 
            `materias`.`nombre` AS `materia`, 
            `materias`.`id` AS `id_materia`,
            `notas`.`id` AS `id_nota`,
            `notas`.`nota1`,
            `notas`.`nota2`,
            `notas`.`nota3`
          FROM 
            `alumnos`
          INNER JOIN 
            `materias` ON `alumnos`.`id_materia` = `materias`.`id`
          LEFT JOIN 
            `notas` ON `alumnos`.`id` = `notas`.`id_alumno` AND `materias`.`id` = `notas`.`id_materia`';

if ($where != '') {
    $query .= ' WHERE ' . $where;
}

$query .= ' ORDER BY `alumnos`.`id`;';

// Ejecuta la consulta
$datos = $database->ejecutarConsulta($query);



$instituto_profesor = $database->ejecutarConsulta("SELECT `profesores`.*, `institutos`.`nombre` as `nombre_instituto` FROM `profesores` INNER JOIN `institutos` 
            on `profesores`.`id_instituto` = `institutos`.`id` 
            WHERE `profesores`.`id` = " . $_SESSION['profesor'][0]['id']);


$materias = $database->ejecutarConsulta("SELECT `materias`.* 
    FROM `materias`
    INNER JOIN `profesores` ON `materias`.`id_profesor` = `profesores`.`id`");




?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos del Alumno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid my-5"> <!-- Cambiado a container-fluid para ocupar todo el ancho -->
        <h3 class="mb-4"><?php echo "Profesor: " . $instituto_profesor[0]["nombre"] . " " . $instituto_profesor[0]["apellido"]?></h3>
        <h3 class="mb-4"><?php echo "Instituto: " . $instituto_profesor[0]["nombre_instituto"]?></h3>
        <h3 class="mb-4">Listado de Alumnos</h3>

        <div class="d-flex justify-content-between mb-3">
            <!-- Formulario de búsqueda -->
            <form action="index_alumno.php" method="GET" class="d-flex">

                <!-- Filtro por Materia -->
                <div class="form-group me-2">
                    <label for="filtro_materia" class="form-label">Materia</label>
                    <select class="form-control" name="filtro_materia" id="filtro_materia">
                        <option value="">Todas las materias</option>
                        <?php
                        foreach ($materias as $materia) {
                            // Compara si la materia actual es la seleccionada
                            $selected = (isset($_GET['filtro_materia']) && $_GET['filtro_materia'] == $materia['id']) ? 'selected' : '';
                            echo "<option value='" . $materia['id'] . "' $selected>" . $materia['nombre'] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <!-- Botón de Buscar -->
                <div class="form-group">
                    <label>&nbsp;</label> <!-- Espaciador para alinear el botón correctamente -->
                    <input type="submit" value="Buscar" class="btn btn-primary form-control">
                </div>
            </form>

            <!-- Botón de nuevo alumno -->
             <?php if (!empty($materias)) {
                echo "<a href='alta_alumno.php' class='btn btn-success align-self-end'>Nuevo Alumno</a>";
             }?>
            
            <a href="../Materia/alta_materia.php" class="btn btn-success align-self-end">Nueva Materia</a>
        </div>

        <?php
        if (isset($_GET['error'])) {
            // Mostramos el error
            echo "<p style='color:red;'>" . htmlspecialchars($_GET['error']) . "</p>";
        }
        if (isset($_GET['success'])) {
            // Mostramos que tiene asistencia
            echo "<p style='color:green;'>" . htmlspecialchars($_GET['success']) . "</p>";
        }
        ?>

        <!-- Tabla ocupando el 100% de la pantalla -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped w-100">
                <thead class="table-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>DNI</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Materia</th>
                        <th>Promedio</th>
                        <th>Asistencia</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datos as $alumno) { ?>
                        <?php $promedio = $Alumno->promedio($alumno['nota1'], $alumno['nota2'], $alumno['nota3']);
                        $estado = $Alumno->estado($database, $promedio, $alumno['id']); ?>
                        <tr>
                            <td><?php echo $alumno['nombre'] . " " . $alumno['apellido']; ?></td>
                            <td><?php echo $alumno['email']; ?></td>
                            <td><?php echo $alumno['dni']; ?></td>
                            <td><?php echo $alumno['fecha_nacimiento']; ?></td>
                            <td><?php echo $alumno['materia']; ?></td>
                            <td>
                                <?php echo number_format($promedio, 2, ',', '. '); ?> <!-- Aquí va el promedio -->
                            </td>
                            <td>
                                <form action="asistencia.php" method="POST">
                                    <input type="hidden" name="id_alumno" value="<?php echo $alumno['id']; ?>">
                                    <input type="hidden" name="id_materia" value="<?php echo $alumno['id_materia']; ?>">
                                    <input type="submit" value="Agregar Asistencia" class="btn btn-success">
                                </form>
                            </td>
                            <td>
                                <?php echo $estado ?> <!-- Aquí va el estado -->
                            </td>
                            <td>
                                <a href="modificar.php?id=<?php echo $alumno['id']; ?>" class="btn btn-warning btn-sm">Modificar</a>
                                <a href="borrar.php?id=<?php echo $alumno['id']; ?>" class="btn btn-danger btn-sm">Borrar</a>
                                <a href="ver_asistencias.php?id=<?php echo $alumno['id']; ?>" class="btn btn-info btn-sm">Ver Asistencias</a>
                                <a href="notas_index.php?id=<?php echo $alumno['id']; ?>&id_materia=<?php echo $alumno['id_materia'] ?>" class="btn btn-info btn-sm">Notas</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div> 
    </div> 

    <a href="../index.php" class="btn btn-secondary">Volver</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>