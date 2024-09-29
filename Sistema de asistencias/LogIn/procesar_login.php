<?php
require_once "../conexion.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $contraseña = $_POST['contraseña'];

    $database = new Database();

    $conn = $database->connect();

    $query= "SELECT * FROM `profesores` WHERE email = '$email' AND password = '$contraseña'";
            $stmt = $database -> conn -> prepare($query) ; //prepara la consulta
            $stmt -> execute(); // ejecuta la consulta
            $usuario = $stmt -> fetchAll(); // Devuelve los datos

            echo "Login exitoso.";

            header('Location: ../Alumno/index_alumno.php');
}

?>