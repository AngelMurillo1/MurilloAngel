<?php


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

        


        if (($promedio >= 7) && ($resultado >= 70)) {
            return "Promoción";
        }elseif (($promedio >= 6) && ($resultado>=60) ) {
            return "Regular";
        }else {
            return "Libre";
        }
    }
}
