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
    $profesor = $stmt -> fetchAll(); // Devuelve los datos
    
    

    if($profesor){
        session_start();
        $_SESSION['profesor'] = $profesor;

        $_SESSION['instituto'] = $profesor['id_instituto'];
        
        header('Location: ../Alumno/index_alumno.php');
    }else{
        $error = "Usuario o contraseña incorrectos";
        header('Location: ../index.php?error=' . urlencode($error));
    }

    

            

        
}

?>