<?php
require_once "script.php";
class Persona {
    public $nombre;
    public $apellido;
    public $fecha_nacimiento;
    public $dni;
    public $localidad;
    public $provincia;
    public $telefono;

    public function __construct($nombre, $apellido, $fecha_nacimiento, $dni, $localidad, $provincia, $telefono) {

        // Formatear fecha de nacimiento y manejar posibles errores
        $fechaFormateada = formatearFecha($fecha_nacimiento);
        if ($fechaFormateada === false) {
            die("Fecha de nacimiento no válida.");
        }


        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->fecha_nacimiento = $fechaFormateada;
        $this->dni = $dni;
        $this->localidad = $localidad;
        $this->provincia = $provincia;
        $this->telefono = $telefono;
    }

    public function mostrarInformacion() {
        return "Nombre: $this->nombre  $this->apellido, Fecha de Nacimiento: $this->fecha_nacimiento, DNI: $this->dni, Localidad: $this->localidad, 
        Provincia: $this->provincia, Teléfono: $this->telefono";
    }
}

?>