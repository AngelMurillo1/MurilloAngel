<?php
require_once "Alumno.php";
require_once "../conexion.php";

 $database = new Database();

 $conn = $database->connect();

 $alumno = new Alumno();

 $id = $_GET['id'];


 $alumnoBuscado=$alumno->getAlumno($database, $id);


 if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $dni = $_POST['dni'];
        $email = $_POST['email'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $materia = $_POST['materia'];

    if(($nombre != $alumnoBuscado[0]['nombre']) or ($apellido != $alumnoBuscado[0]['apellido']) 
    or ($dni != $alumnoBuscado[0]['dni']) or ($email != $alumnoBuscado[0]['email']) 
    or ($fecha_nacimiento != $alumnoBuscado[0]['fecha_nacimiento']) or ($materia != $alumnoBuscado[0]['materia'])){
        
        $nota1 = $alumnoBuscado[0]['nota1']??'NULL';
        $nota2 = $alumnoBuscado[0]['nota2']??'NULL';
        $nota3 = $alumnoBuscado[0]['nota3']??'NULL';
        $database->ejecutarConsulta("UPDATE `alumnos` 
            SET `nombre` = '$nombre', 
                `apellido` = '$apellido', 
                `dni` = '$dni', 
                `email` = '$email', 
                `fecha_nacimiento` = '$fecha_nacimiento', 
                `nota1` = $nota1,
                `nota2` = $nota2, 
                `nota3` = $nota3, 
                `materia` = '$materia' 
            WHERE `id` = $id");

        header('Location: index_alumno.php');
    
    }else{
        header('Location: index_alumno.php');
    }
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="modificar.php?id=<?php echo $alumnoBuscado[0]['id'] ?>" method="POST">
    <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $alumnoBuscado[0]['nombre']?>"><br><br>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" value="<?php echo $alumnoBuscado[0]['apellido']?>"><br><br>

        <label for="dni">DNI:</label>
        <input type="text" id="dni" name="dni" value="<?php echo $alumnoBuscado[0]['dni']?>"><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $alumnoBuscado[0]['email']?>"><br><br>

        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $alumnoBuscado[0]['fecha_nacimiento']?>"><br><br>

        <label for="materia">Materia:</label>
        <input type="text" id="materia" name="materia" value="<?php echo $alumnoBuscado[0]['materia']?>"><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>