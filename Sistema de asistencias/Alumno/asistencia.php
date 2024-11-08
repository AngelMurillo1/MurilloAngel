<?php
require_once "../conexion.php";


 if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $database = new Database();

    $id_alumno = $_POST['id_alumno'];
    $id_materia = $_POST['id_materia'];

    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $fecha=date("Y-m-d");

    $asistencias = $database->ejecutarConsulta("SELECT * FROM `asistencias` WHERE `id_alumno` = $id_alumno AND `id_materia` = $id_materia AND DATE_FORMAT(fecha,'%Y-%m-%d') = '$fecha'");

    if(Empty($asistencias)){
        $fecha=date("Y-m-d H:i:s");
        $database->ejecutarConsulta("INSERT INTO `asistencias`(`id`, `fecha`, `id_materia`, `id_alumno`) VALUES (NULL,'$fecha','$id_materia','$id_alumno')");
        $success = "Asistencia agregada";
        header('Location: index_alumno.php?success=' . urlencode($success));
    }else{
        $error = "Este alumno ya tiene asistencia";
        header('Location: index_alumno.php?error=' . urlencode($error));
    }
    
    

 }

?>