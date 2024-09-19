<?php
require_once "Empleado.php";
require_once "Cliente.php";

function formatearFecha($fecha_nacimiento) {
    // Crear un objeto DateTime a partir de la fecha de nacimiento en el formato original
    $fecha = DateTime::createFromFormat('d-m-Y', $fecha_nacimiento);

    // Verificar si la fecha fue creada correctamente
    if (!$fecha) {
        return false; // Retorna false si la fecha no es válida
    }

    // Formatear la fecha en el formato DD-MM-AAAA
    return $fecha->format('d-m-Y');
}

function calcularEdad($fecha_nacimiento) {
    // Formatear la fecha de nacimiento al formato correcto
    $fecha = DateTime::createFromFormat('d-m-Y', $fecha_nacimiento);
    
    // Verificar si la conversión de fecha fue exitosa
    if (!$fecha) {
        return "Fecha de nacimiento no válida.";
    }
    
    $hoy = new DateTime(); // Fecha actual
    $edad = $hoy->diff($fecha); // Calcular la diferencia entre la fecha actual y la de nacimiento
    
    return $edad->y; // Devolver solo los años
}
function aplicarImpuestoEmpleado($monto, $legajo) {
    if (substr($legajo, 0, 2) == '99') {
        return $monto; // No se aplica impuesto
    } else {
        return $monto * 1.21; // Aplica 21% de impuesto
    }
}

function aplicarImpuestoCliente($monto, $fecha_nacimiento) {
    $edad = calcularEdad($fecha_nacimiento);
    
    // Verificar si la edad es un número
    if (!is_numeric($edad)) {
        return $edad; // Retornar el mensaje de error si la fecha de nacimiento no es válida
    }

    if ($edad < 18) {
        return "No se puede ingresar un monto para clientes menores de 18 años.";
    } else {
        return $monto * 1.3; // Aplica 30% de impuesto
    }
}
?>