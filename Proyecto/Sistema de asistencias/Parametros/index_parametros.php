<?php 
require_once "../conexion.php";
require_once "Parametros.php";

$database = new Database();

$conn = $database->connect();// conecta a la base de datos

$parametros = new Parametros();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

   $porcentajePromocion = $_POST["porcentajePromocion"]; 

   $porcentajeRegular = $_POST["porcentajeRegular"]; 

   $notaPromocion = $_POST["notaPromocion"]; 

   $notaRegular = $_POST["notaRegular"]; 


   $parametros->setParametros($database, $porcentajePromocion, $porcentajeRegular, $notaPromocion, $notaRegular);


}




$datos = $parametros->getParametros($database);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Parámetros</title>
    <!-- Enlace a Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Configurar Parámetros</h2>
        <form action="index_parametros.php" method="post">
            <div class="form-group">
                <label for="porcentajePromocion">Porcentaje Promoción</label>
                <input type="number" class="form-control" id="porcentajePromocion" name="porcentajePromocion" min="1" max="100" value="<?php echo $datos[0]['porcentajePromocion']; ?>">
            </div>
            <div class="form-group">
                <label for="porcentajeRegular">Porcentaje Regular</label>
                <input type="number" class="form-control" id="porcentajeRegular" name="porcentajeRegular" min="1" max="100" value="<?php echo $datos[0]['porcentajeRegular']; ?>">
            </div>
            <div class="form-group">
                <label for="notaPromocion">Nota Promoción</label>
                <input type="number" class="form-control" id="notaPromocion" name="notaPromocion" min="1" max="10" value="<?php echo $datos[0]['notaPromocion']; ?>">
            </div>
            <div class="form-group">
                <label for="notaRegular">Nota Regular</label>
                <input type="number" class="form-control" id="notaRegular" name="notaRegular" min="1" max="10" value="<?php echo $datos[0]['notaRegular']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Enviar Parámetros</button>
            <div class="mt-3">
                <?php 
                if (isset($_GET['error'])) {
                    echo "<div class='alert alert-danger'>{$_GET['error']}</div>";
                }
                if (isset($_GET['success'])) {
                    echo "<div class='alert alert-success'>{$_GET['success']}</div>";
                }
                ?>
            </div>
            <a href="../Alumno/index_alumno.php" class="btn btn-secondary mt-3">Volver</a>
        </form>
    </div>
</body>
</html>