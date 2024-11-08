<?php
require_once "Alumno.php";
require_once "../conexion.php";

 $database = new Database();

 $conn = $database->connect();

 $alumno = new Alumno();

 $id = $_GET['id'];

 $materias = $database->ejecutarConsulta('SELECT * FROM `materias`');

 $alumnoBuscado=$alumno->getAlumno($database, $id);


 if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $dni = $_POST['dni'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $materia = $_POST['materia'];
        $email = $_POST['email'];

        if(($nombre != $alumnoBuscado[0]['nombre']) or ($apellido != $alumnoBuscado[0]['apellido']) 
        or ($dni != $alumnoBuscado[0]['dni']) or ($email != $alumnoBuscado[0]['email']) 
        or ($fecha_nacimiento != $alumnoBuscado[0]['fecha_nacimiento']) or ($materia != $alumnoBuscado[0]['materia'])){
            
            $database->ejecutarConsulta("UPDATE `alumnos` 
                                        SET `nombre`='$nombre',
                                        `apellido`='$apellido',`dni`=$dni,
                                        `fecha_nacimiento`='$fecha_nacimiento',
                                        `id_materia`=$materia,`email`='$email'
                                         WHERE id=$id");
    
            header('Location: index_alumno.php');
        
        }else{
            header('Location: index_alumno.php');
        }
     }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Alumno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3 class="text-center mb-4">Modificar Datos del Alumno</h3>
        <form action="modificar.php?id=<?php echo $alumnoBuscado[0]['id']; ?>" method="POST" class="card p-4 shadow-lg">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $alumnoBuscado[0]['nombre']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido:</label>
                <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $alumnoBuscado[0]['apellido']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="dni" class="form-label">DNI:</label>
                <input type="text" class="form-control" id="dni" name="dni" value="<?php echo $alumnoBuscado[0]['dni']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $alumnoBuscado[0]['email']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento:</label>
                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $alumnoBuscado[0]['fecha_nacimiento']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="materia" class="form-label">Materia:</label>
                <select name="materia" id="materia"  class="form-control" required> <!-- Menú desplegable para seleccionar la materia -->
                <?php
                foreach ($materias as $materia) { // Itera sobre las materias disponibles
                    $selected = ($materia['id'] == $alumnoBuscado[0]['materia_id']) ? 'selected' : ''; // Marca la materia actual como seleccionada
                    echo '<option value="' . $materia['id'] . '" ' . $selected . '>' . $materia['nombre'] . '</option>'; // Crea una opción en el menú
                }
                ?>
            </select>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>