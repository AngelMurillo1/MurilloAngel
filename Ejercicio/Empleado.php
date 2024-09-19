<?php

require_once "Persona.php";
require_once "Cliente.php";
require_once "script.php";

class Empleado extends Persona {
    public $legajo;

    public function __construct($nombre, $apellido, $fecha_nacimiento, $dni, $localidad, $provincia, $telefono, $legajo) {
        parent::__construct($nombre, $apellido, $fecha_nacimiento, $dni, $localidad, $provincia, $telefono);
        $this->legajo = $legajo;
    }

    public function mostrarInformacion() {
        $info = parent::mostrarInformacion();
        return "$info, Legajo: $this->legajo";
    }

    public function calcularMontoConImpuesto($monto) {
        return aplicarImpuestoEmpleado($monto, $this->legajo);
    }
}
?>