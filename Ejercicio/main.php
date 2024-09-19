<?php

require_once "Persona.php";
require_once "Empleado.php";
require_once "Cliente.php";
require_once "script.php";

if($_SERVER['REQUEST_METHOD'] == 'POST' ){
    $tipoUsuario = $_POST['tipo_usuario'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $dni = $_POST['dni'];
    $localidad = $_POST['localidad'];
    $provincia = $_POST['provincia'];
    $telefono = $_POST['telefono'];
}

if ($tipoUsuario == 'empleado') {
    $legajo = $_POST['legajo'];
    $empleado = new Empleado($nombre, $apellido, $fecha_nacimiento, $dni, $localidad, $provincia, $telefono, $legajo);
    echo $empleado->mostrarInformacion();
    echo "<br>Monto con impuesto: " . $empleado->calcularMontoConImpuesto(1000);
} elseif ($tipoUsuario == 'cliente') {
    $numeroCuenta = $_POST['numero_cuenta'];
    $monto = $_POST['monto'];
    $cliente = new Cliente($nombre, $apellido, $fecha_nacimiento, $dni, $localidad, $provincia, $telefono, $numeroCuenta, $monto);
    
    echo $cliente->mostrarInformacion();
    echo "<br>Monto con impuesto: " . $cliente->calcularMontoConImpuesto();
}

?>
