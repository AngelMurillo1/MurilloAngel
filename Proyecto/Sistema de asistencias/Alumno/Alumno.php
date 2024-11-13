<?php

require_once "../Parametros/Parametros.php";

class Alumno
{

    public function setAlumno($database, $nombre, $apellido, $dni, $fecha_nacimiento, $materia, $email)
    {
        $query = "INSERT INTO `alumnos`(`id`, `nombre`, `apellido`, `dni`, `fecha_nacimiento`, `id_materia`, `email`) 
        VALUES (NULL,'$nombre','$apellido', $dni, '$fecha_nacimiento', $materia,'$email')";
        var_dump($query);
        $stmt = $database->conn->prepare($query); //prepara la consulta
        $stmt->execute(); // ejecuta la consulta
        $alumno = $stmt->fetchAll(); // Devuelve los datos

    }

    public function getAlumno($database, $id)
    {
        $query = "SELECT * FROM `alumnos` WHERE `alumnos`.`id` = $id";
        $stmt = $database->conn->prepare($query); //prepara la consulta
        $stmt->execute(); // ejecuta la consulta
        $alumno = $stmt->fetchAll(); // Devuelve los datos 

        return $alumno;
    }

    public function getNotaAlumno($database, $id, $id_materia)
    {
        $query = "SELECT * FROM `notas` WHERE `id_alumno`= $id AND `id_materia` = $id_materia";
        $stmt = $database->conn->prepare($query); //prepara la consulta
        $stmt->execute(); // ejecuta la consulta
        $notas = $stmt->fetchAll(); // Devuelve los datos 

        return $notas;
    }

    public function setNotaAlumno($database, $id, $id_materia, $nota1, $nota2, $nota3)
    {
        // Preparar la consulta para verificar si existe el registro
        $query = "SELECT COUNT(*) as 'count' FROM  `notas` WHERE `id_alumno` = $id AND `id_materia` = $id_materia";
        $stmt = $database->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();

        if ($result[0]['count'] > 0) {
            // Si el registro existe, actualizamos las notas
            $query = "UPDATE `notas` SET nota1 = $nota1, nota2 = $nota2, nota3 = $nota3 WHERE `id_alumno` = $id AND `id_materia` = $id_materia";
            $stmt = $database->conn->prepare($query);
        } else {
            // Si el registro no existe, insertamos un nuevo registro
            $query = "INSERT INTO notas (id, id_alumno, id_materia, nota1, nota2, nota3) VALUES (NULL, $id, $id_materia, $nota1, $nota2, $nota3)";
            $stmt = $database->conn->prepare($query);
        }
        $stmt->execute();

        return header('Location: index_alumno.php');
    }

    public function promedio($nota1,$nota2,$nota3){
        $resultado = ($nota1 + $nota2 + $nota3)/3;
        return $resultado;
    }

    public function estado($database, $promedio, $id){
        $parametros = new Parametros();

        $query = "SELECT COUNT(*) as 'count' FROM  `asistencias` WHERE `id_alumno` = $id";
        $stmt = $database->conn->prepare($query);
        $stmt->execute();
        $asistenciasAlumno = $stmt->fetchAll();
        
        $query = "SELECT COUNT(DISTINCT(DATE(fecha))) FROM `asistencias`";
        $stmt = $database->conn->prepare($query);
        $stmt->execute();
        $cantidadDias = $stmt->fetchAll();

        if ($cantidadDias[0][0] != 0) {
            $resultado = ($asistenciasAlumno[0][0] * 100) / $cantidadDias[0][0];
        }else{
            return "No tiene asistencias cargadas";
        }

        $datos = $parametros->getParametros($database);

        $porcentajePromocion = $datos[0]["porcentajePromocion"];
        $porcentajeRegular = $datos[0]["porcentajeRegular"];
        $notaPromocion = $datos[0]["notaPromocion"];
        $notaRegular = $datos[0]["notaRegular"];

        if (($promedio >= $notaPromocion) && ($resultado >= $porcentajePromocion)) {
            return "Promoción";
        }elseif (($promedio >= $notaRegular) && ($resultado>=$porcentajeRegular) ) {
            return "Regular";
        }else {
            return "Libre";
        }
    }

    public function validateAlumno($nombre, $apellido, $dni, $fecha_nacimiento){

        if ((!ctype_alpha($nombre) && !ctype_alpha($apellido))) {
           return "El nombre y el apellido deben tener caracteres alfabeticos";
        } 
   
        if (strlen($nombre) >= 50) {
           return "El nombre debe tener menos de 50 caracteres.";
       }

   
       if (strlen($apellido) >= 50) {
           return "El apellido debe tener menos de 50 caracteres.";
       }
   
       if (!ctype_digit($dni)) {
           return "El dni solo debe contener caracteres numéricos.";
       }
   
       if (strlen($dni) >= 10) {
           return "El DNI debe tener menos de 10 caracteres.";
       }

         // Intentar crear un objeto DateTime a partir de la fecha ingresada
        $fecha = DateTime::createFromFormat('Y-m-d', $fecha_nacimiento);

        // Verificar que la fecha no sea en el futuro
        $hoy = new DateTime();
        if ($fecha > $hoy) {
        return "La fecha de nacimiento no puede ser una fecha futura.";
        }

        $edad_minima = 18;

        // Verificar que la persona tenga al menos $edad_minima años
        $edad = $hoy->diff($fecha)->y;  // Calcula la diferencia de años
        if ($edad < $edad_minima) {
        return "Debe tener al menos $edad_minima años.";
        }

        return "valido";
       }  
}
