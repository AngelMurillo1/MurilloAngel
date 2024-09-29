<?php
require_once "../conexion.php";

$database = new Database();

$datos = $database->ejecutarConsulta('SELECT * FROM `alumnos`');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Asistencias</title>
</head>
<body>
    <h3>Datos del Alumno</h3>
    <table>
        <thead> 
            <th>Nombre </th>
            <th>Email </th>
            <th>DNI </th>
            <th>Fecha de Nacimiento </th>
            <th>Materia</th>
            <th>Promedio </th>
            <th>Asistencia </th>
            <th>Estado </th>
            <th><a href="alta_alumno.php">Nuevo Alumno</a></th>           
        </thead>
        <tbody>
            <?php foreach ($datos as $alumno) { ?>
               <tr>
                <td>
                    <?php echo $alumno['nombre']." ".$alumno['apellido']; ?>
                </td>
                <td>
                    <?php echo $alumno['email']; ?>
                </td>
                <td>
                    <?php echo $alumno['dni']; ?>
                </td>
                <td>
                    <?php echo $alumno['fecha_nacimiento']; ?>
                </td>
                <td>
                    <?php echo $alumno['materia']; ?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <a href="modificar.php?id=<?php echo $alumno['id']; ?>">Modificar Alumno</a>
                </td>
               </tr> <?php }?>
        </tbody>
    </table>
</body>
</html>