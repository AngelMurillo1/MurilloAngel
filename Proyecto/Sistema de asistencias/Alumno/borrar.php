<?php
    require_once "Alumno.php";
    require_once "../conexion.php";

    $database = new Database();

    $conn = $database->connect();

    $alumno = new Alumno();

    $id= $_GET['id'];

    $database->ejecutarConsulta("DELETE FROM `alumnos` WHERE `id` = $id");

    header('Location: index_alumno.php');

?>