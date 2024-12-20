<?php

require_once "../conexion.php";
require_once "../Profesor/Profesor.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener y sanitizar datos
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $email = trim($_POST['email']);
    $password = $_POST['contraseña'];
    $legajo = $_POST['legajo'];
    $dni = $_POST['dni'];
    $instituto = $_POST['instituto'];
    
    $database = new Database();//crear una base de datos

    $conn = $database->connect();// conecta a la base de datos


    $profesor = new Profesor();

    $profesorValidado = $profesor->validateProfesor($nombre, $apellido, $dni, $email, $password, $legajo);

    

    if ($profesorValidado == "valido") {
        $profesorCreado = $profesor->setProfesor($database, $nombre, $apellido, $dni, $email, $password, $legajo, $instituto);
    
        $database->ejecutarConsulta("INSERT INTO `institutos_profesores`(`id`, `id_instituto`, `id_profesor`) VALUES (NULL,'$instituto','$profesorCreado')");

        header('Location: ../index.php');
    }else {
        header('Location: registro.php?error='. $profesorValidado);
        return $profesorValidado;
    }

   


    

    
    

    

    //muestra los datos en pantalla
    //var_dump($nombre, $apellido, $email, $contraseña, $tipo);
    }



?>
