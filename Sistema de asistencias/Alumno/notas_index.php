<?php
require_once "../conexion.php";
require_once "Alumno.php";

$database = new Database();

$conn = $database->connect(); // conecta a la base de datos

$alumno = new Alumno();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id =$_POST['id'];
    
    $id_materia =$_POST['id_materia'];

    if (isset($_POST['nota1'])) {
        $nota1 = $_POST['nota1'];
    }else {
        $nota1 = 0;
    }
    
    if (isset($_POST['nota2'])) {
        $nota2 = $_POST['nota2'];
    }else {
        $nota2 = 0;
    }

    if (isset($_POST['nota3'])) {
        $nota3 = $_POST['nota3'];
    }else {
        $nota3 = 0;
    }

    $alumno->setNotaAlumno($database, $id, $id_materia, $nota1, $nota2, $nota3);

}else {
    $id_materia = $_GET['id_materia'];

    $id = $_GET['id'];
    
    
    $alumnoBuscado = $alumno->getAlumno($database, $id);
    
    $notas = $alumno->getNotaAlumno($database, $id, $id_materia);
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Notas</title>
    <!-- Incluye Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Ingresar Notas</h2>
        <form action="notas_index.php" method="POST" class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="nota1" class="form-label">Nota 1</label>
                <input type="number" class="form-control" id="nota1" name="nota1" value="<?php if (isset($notas[0]['nota1'])) { echo $notas[0]['nota1']; } ?>" required>
            </div>
            <div class="mb-3">
                <label for="nota2" class="form-label">Nota 2</label>
                <input type="number" class="form-control" id="nota2" name="nota2" value="<?php if (isset($notas[0]['nota2'])) { echo $notas[0]['nota2']; } ?>" required>
            </div>
            <div class="mb-3">
                <label for="nota3" class="form-label">Nota 3</label>
                <input type="number" class="form-control" id="nota3" name="nota3" value="<?php if (isset($notas[0]['nota3'])) { echo $notas[0]['nota3']; } ?>" required>
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="id_materia" value="<?php echo $id_materia; ?>">
            <button type="submit" class="btn btn-primary">Enviar nota</button>
        </form>
    </div>

    <!-- Script de Bootstrap para la validación -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>