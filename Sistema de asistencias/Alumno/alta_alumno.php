<?php
require_once "../conexion.php";
require_once "Alumno.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $dni = $_POST['dni'];
        $email = $_POST['email'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $materia = $_POST['materia'];

        $database = new Database();

        $conn = $database->connect();// conecta a la base de datos

        $alumno = new Alumno();


        $alumno->setAlumno($database, $nombre, $apellido, $dni, $email, $fecha_nacimiento, $materia);

        header('Location: index_alumno.php');
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
    <form action="alta_alumno.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre"><br><br>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido"><br><br>

        <label for="dni">DNI:</label>
        <input type="text" id="dni" name="dni"><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br><br>

        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento"><br><br>

        <label for="materia">Materia:</label>
        <input type="text" id="materia" name="materia"><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>