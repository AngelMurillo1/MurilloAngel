<?php

class Profesor{

    public function setProfesor($database, $nombre, $apellido, $dni, $email, $password, $legajo, $instituto){
        $query= "INSERT INTO `profesores`(`id`, `nombre`, `apellido`, `dni`, `email`, `password`, `legajo`, `id_instituto`) 
        VALUES (NULL,'$nombre','$apellido','$dni','$email','$password','$legajo','$instituto')";
            $stmt = $database -> conn -> prepare($query) ; //prepara la consulta
            $stmt -> execute(); // ejecuta la consulta
            $lastId = $database->conn->lastInsertId(); // Devuelve los datos

            return $lastId;
    }

    public function validateProfesor($nombre, $apellido, $dni, $email, $password, $legajo){

     if ((!ctype_alpha($nombre) && !ctype_alpha($apellido))) {
        return "El nombre y el apellido deben tener caracteres alfabeticos";
     } 

     if (strlen($nombre) >= 50) {
        return "El nombre debe tener menos de 50 caracteres.";
    }

    if (strlen($password) >= 50) {
        return "La contraseña debe tener menos de 50 caracteres.";
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

    // Comprobar que solo contiene números o letras
    if (!ctype_alnum($legajo)) {
        return "El legajo solo debe contener caracteres alfanuméricos.";
    }
    
    if (strlen($legajo) >= 6) {
        return "El legajo debe tener menos de 6 caracteres.";
    }

    if ((!filter_var($email, FILTER_VALIDATE_EMAIL))) {
      return "Email no valido"; 
    }
     return "valido";
    }  
    
     
}

?>